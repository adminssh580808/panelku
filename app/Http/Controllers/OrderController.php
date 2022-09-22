<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Service_cat;
use App\Custom_price;
use App\Service;
use Validator;
use Log;
use App\Services_pulsa;
use App\Provider;
use App\Order;
use App\Orders_pulsa;
use App\Oprator;
use App\Helpers\FArray;
use App\Helpers\Numberize;
use App\Helpers\SearchKey;
use App\Helpers\Order_pulsa as OrderPulsa;
use App\Helpers\Order_sosmed as OrderSosmed;
use App\Activity;
use App\Balance_history;
use Auth;
use Alert;
use App\User;
use App\API;
use App\ApiRequestParam;
use App\ApiRequestHeader;
use App\ApiResponseLog;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use App\News;


class OrderController extends Controller
{
    public function __construct() {
    	$this->middleware('auth');
    }

    public function sosmed(){
        $data['pendingprocessing'] = Order::where('user_id',Auth::user()->id)->whereIn('status',['Pending','Processing'])->count();
        $data['used_balance'] = Balance_history::where('user_id',Auth::user()->id)->where('action','Cut Balance')->sum('quantity');
        $data['balance_usage_thismo'] = Balance_history::where('user_id',Auth::user()->id)->whereRaw('MONTH(created_at) = '.Carbon::now()->format('m'))->sum('quantity');
        $data['balance_usage_lastmo'] = Balance_history::where('user_id',Auth::user()->id)->whereRaw('MONTH(created_at) = '.Carbon::now()->subMonth()->format('m'))->sum('quantity');
        $data['total_order_thismo'] = Order::whereRaw('MONTH(created_at) ='.Carbon::now()->format('m'))->where('user_id',Auth::user()->id)->count();
        $data['total_order_lastmo'] = Order::whereRaw('MONTH(created_at) ='.Carbon::now()->subMonth()->format('m'))->where('user_id',Auth::user()->id)->count();
        if($data['total_order_thismo']==0 && $data['total_order_lastmo'] ==0){
            $data['order_percentage'] = $data['total_order_thismo'];
            $data['total_order_thismo'] = 0;
            $data['total_order_lastmo'] = 0;
        }else{
            $data['order_percentage'] = ($data['total_order_thismo'] / ($data['total_order_lastmo']!=0?:1) == 1 ? 0 : ($data['total_order_thismo']/($data['total_order_lastmo']!=0?:1))*100);

        }
        if($data['balance_usage_thismo']==0 && $data['balance_usage_lastmo']==0){
            $data['balance_percentage'] = 0;
        }else{
            $data['balance_percentage'] = ($data['balance_usage_thismo']/($data['balance_usage_lastmo'] != 0?:1))*100;
        }
        $news = News::orderByDesc('id')->get();
        $cat = Service_cat::where('type','SOSMED')->where('status','Active')->orderBy('name','ASC')->get();
        return view('order.sosmed.new', $data ,compact('cat','news'));
        // return view('/order/sosmed');
    }
    public function sosmed_mass() {
        $news = News::orderByDesc('id')->get();
        return view('order.sosmed.mass',compact('news'));
    }
    public function sosmed_history(Request $r){
        $search = $r->get('search');
        $order = Order::where('user_id',auth()->user()->id)->where(function($q) use ($r, $search) {
             $q->where('target','LIKE',"%$search%")
            ->orWhere('id','LIKE',"%$search%");
        })->orderBy('id','desc')->paginate(15);
    $news = News::orderByDesc('id')->get();
        return view('order.sosmed.history', compact('order','news'));
    }
    public function sosmed_post(Request $r) {

        if($r->service == NULL) {
            session()->flash('danger','Harap pilih layanan terlebih dahulu!');
            return redirect()->back();
        }

        $service_id = $r->service;
        $post_quantity = $r->quantity;
        $post_link = $r->target;

        $custom_comment = false;
        $likes_comments = false;

        if (isset($r->custom_comment)) {
            $custom_comment = true;

        }else if(isset($r->username)) {
            $likes_comments = true;
        }

        $data_service = Service::where('id',$service_id)->firstOrFail();
        $pid = $data_service->pid;
        $min = $data_service->min;
        $max = $data_service->max;
        $api_id = $data_service->provider->api_id;

        $r->validate([
            'service'=>'required',
            'quantity'=>"required|integer|min:$min|max:$max"
        ],
        [
            'service.required'=>'Harap pilih layanan terlebih dahulu!',
            'quantity.required'=>'Harap isi jumlah terlebih dahulu!',
            'min'=>"Jumlah minimal adalah $min",
            'max'=>"Jumlah maksimal adalah $max",
        ]);

        $custom_price = Custom_price::where('service_id',$data_service->id)->where('user_id',Auth::user()->id)->first();

        if(!$custom_price) {
            $total_price = ($data_service->price + $data_service->keuntungan) / 1000 * $r->quantity ;
        }else{
            $total_price = ($data_service->price + $data_service->keuntungan - $custom_price->potongan) / 1000 * $r->quantity;
        }

        $user = User::find(Auth::user()->id);
        if($user->balance < $total_price) {
            Alert::error('Saldo tidak cukup','Error');
            session()->flash('danger','Saldo Anda Tidak Cukup, Silahkan Deposit Terlebih Dahulu. ');
            return redirect()->back();
        }




        if($data_service->type == 'custom_comment') {
            $custom_comments = $r->custom_comment;
        }else if($data_service->type == 'comment_likes') {
            $username = $r->username;
        }

        $api = API::find($data_service->provider->api_id);

        // Build api request parameters
        $params = [];
        $apiRequestParams = ApiRequestParam::where(['api_id' => $api_id, 'api_type' => 'order'])->get();
        if (!$apiRequestParams->isEmpty()) {
            foreach ($apiRequestParams as $row) {
                if ($row->param_type === 'custom') {
                    $params[$row->param_key] = $row->param_value;
                } else {
                    // If column is package id then assign package id value in api mapping
                    if ($row->param_value == 'custom_comments' && $data_service->type == 'custom_comment') {
                            $params[$row->param_key] = $r->custom_comment;
                    } elseif ($row->param_value == 'username' && $data_service->type == 'comment_likes') {

                        $params[$row->param_key] = $r->username;
                    } elseif ($row->param_value == 'service_id') {
                        $params[$row->param_key] = $data_service->pid;
                    } elseif ($row->param_value == 'target') {
                        $params[$row->param_key] = $post_link;
                    } elseif ($row->param_value == 'quantity') {
                        $params[$row->param_key] = $post_quantity;
                    }
                }
            }
            // create new client and make call
            $client = new Client();
            try {
                // if Method is GET then change request key in Guzzle
                $param_key = 'form_params';
                if ($api->order_method === 'GET') {
                    $param_key = 'query';
                }

                $res = $client->request($api->order_method, $api->order_end_point, [
                    $param_key => $params,
                    'headers' => ['Accept' => 'application/json'],
                ]);

                if ($res->getStatusCode() === 200) {
                    $resp = $res->getBody()->getContents();

                    $json_result = json_decode($resp, true);
                    $poid = SearchKey::arraySearch($json_result, $api->order_id_key);
                    // Response keys are equal to success response?
                    if ($poid) {
                        // Get orderID column from API response

                        $order = new Order;
                        $order->poid = $poid;
                        $order->user_id = Auth::user()->id;
                        $order->service_id = $service_id;
                        $order->target = $post_link;
                        $order->quantity = $post_quantity;
                        $order->start_count = 0;
                        $order->remains = $post_quantity;
                        $order->price = $total_price;
                        $order->status = 'Pending';
                        $order->place_from = 'WEB';
                        if($custom_comment) {
                            $order->notes = $custom_comments;
                        }else if($likes_comments) {
                            $order->notes = $username;
                        }else{
                            $order->notes = "-";
                        }
                        $order->refund = 0;
                        $order->save();

                        $user->balance = $user->balance - $total_price;
                        $user->save();

                        $balance_history = new Balance_history;
                        $balance_history->user_id = Auth::user()->id;
                        $balance_history->action = "Cut Balance";
                        $balance_history->quantity = $total_price;
                        $balance_history->desc = "Melakukan Pemesanan $data_service->name Dengan Jumlah $post_quantity";
                        $balance_history->save();

                        $activity = new Activity;
                        $activity->user_id = Auth::user()->id;
                        $activity->type = "Order";
                        $activity->description = "Melakukan Pemesanan $data_service->name Dengan Jumlah $post_quantity";
                        $activity->user_agent = $r->header('User-Agent');
                        $activity->ip = $r->ip();
                        $activity->save();

                        ApiResponseLog::create([
                            'order_id' => $order->id,
                            'api_id' => $api_id,
                            'response' => $resp
                        ]);

                        Alert::success('Sukses order!','Sukses');
                        session()->flash('success',"<b>Pesanan anda akan segera diproses.</b><br><b>ID Pesanan: </b>$order->id<br><b>Layanan:</b> $data_service->name <br> <b>Target:</b> $post_link <br> <b>Jumlah:</b> $post_quantity <br> <b>Harga:</b> ".config('web_config')['CURRENCY_CODE']." ".Numberize::make($total_price));
                        return redirect()->back();
                    }else{
                        Log::info($json_result);
                        session()->flash('danger',"Error: Layanan tidak tersedia.");
                        return redirect()->back();
                    }

                }

            } catch (ClientException $e) {
                Log::info($e->getMessage());
                session()->flash('danger',"Error: Layanan tidak tersedia (2).");
                return redirect()->back();

            }
        }




    }
    public function get_service(Request $r){
        $service = Service::where('category_id',$r->cat_id)->where('status','Active')->orderBy('name','asc')->get();
        $return = "<option value=''>".__('Pilih salah satu..')."</option>";
        foreach($service as $data){
            $return .= "<option value='$data->id'>$data->name</option>";
        }
        return $return;
    }
    public function check_sosmed(Request $r) {

        $sid = $r->sid;
        $check = Service::find($sid);

        if($check->type == 'Custom Comment') {
            return "custom_comment";
        }else if($check->type == 'Comment Likes') {
            return "likes_comment";
        }else{
            return $check->type;
        }
    }
    public function get_service_data(Request $r){
        $service = Service::where('id',$r->sid)->first();
        $custom_price = Custom_price::where('service_id',$service->id)->where('user_id',Auth::user()->id)->first();

        if(!$custom_price) {
            $price = $service->price + $service->keuntungan;
        }else{
            $price = ($service->price + $service->keuntungan) - $custom_price->potongan;
        }
        $note = $service->note;
        $note = nl2br($note);

        return "<div class='alert alert-primary alert-has-icon'>

                              <div class='alert-body'>

                                <div class ='alert-title'><span class='alert-icon'><i class='fas fa-info-circle'></i></span> <b>Informasi Layanan</b></div>
                                $note
                              </div>
                            </div>

                <div class='row'>
                    <div class='col-12'>
                        <label>".__('Harga')."</label>
                        <div class='alert alert-primary alert-has-icon'>
                            <div class='alert-body'>
                                <div class='alert-title'>
                                    <span class='alert-icon'><i class='fas fa-info-circle'></i></span>
                                    ".convert($price)."
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='col-6'>
                        <label>".__('Min Pesanan')."</label>
                        <div class='alert alert-primary alert-has-icon'>
                            <div class='alert-body'>
                                <div class='alert-title'>
                                    <span class='alert-icon'><i class='fas fa-info-circle'></i></span>
                                    $service->min
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='col-6'>
                        <label>".__('Max Pesanan')."</label>
                        <div class='alert alert-primary alert-has-icon'>
                            <div class='alert-body'>
                                <div class='alert-title'>
                                    <span class='alert-icon'><i class='fas fa-info-circle'></i></span>
                                    $service->max
                                </div>
                            </div>
                        </div>
                    </div>
                </div>";
    }

    public function get_price(Request $r){
        $service = Service::where('id',$r->sid)->first();
        $custom_price = Custom_price::where('service_id',$service->id)->where('user_id',Auth::user()->id)->first();

        if(!$custom_price) {
            $price = $service->price + $service->keuntungan;
        }else{
            $price = ($service->price + $service->keuntungan) - $custom_price->potongan;
        }

        return convert3($price);
    }


    public function sosmed_mass_post(Request $r) {
        $r->validate([
            'mass'=>'required'
        ]);
        $mass = $r->mass;
        $textAr = explode(PHP_EOL, $mass);
        $total_error = 0;
        $total_success = 0;
        $final_price = 0;

        // dd($textAr);
        foreach ($textAr as $line) {
            $separateLine = explode("|",$line);

            if (count($separateLine) != 3) {
                // session()->flash('danger','Input tidak sesuai');
                return redirect()->back()->withErrors('Input tidak sesuai');
            }

            $post_service = $separateLine[0];
            $post_link = $separateLine[1];
            $post_quantity = $separateLine[2];

            $post_array = [
                'sid'=>$post_service,
                'post_link' => $post_link,
                'post_quantity'=>$post_quantity
            ];

            $data_service = Service::where('id',$post_service)->first();
            $api_id = $data_service->provider->additional;
            if(!$data_service) {
                $total_error++;
            }else{
                $pid = $data_service->pid;
                $min = $data_service->min;
                $max = $data_service->max;
                $validator = Validator::make($post_array, [
                    'sid'=>'exists:services,id',
                    'post_quantity'=>"integer|min:$min|max:$max"
                ]);
                if($validator->fails()){
                    $total_error += count($validator->messages());
                    continue;
                }
                $custom_price = Custom_price::where('service_id',$data_service->id)->where('user_id',Auth::user()->id)->first();
                if(!$custom_price) {
                    $total_price = ($data_service->price + $data_service->keuntungan) / 1000 * $post_quantity ;
                }else{
                    $total_price = ($data_service->price + $data_service->keuntungan - $custom_price->potongan) / 1000 * $post_quantity;
                }
                $user = User::find(Auth::user()->id);
                if($user->balance < $total_price) {
                    Alert::error('Saldo tidak cukup','Error');
                    session()->flash('danger','Error: Saldo anda tidak cukup (2) ');
                    return redirect()->back();
                }


                if($data_service->type == 'custom_comment') {
                    $custom_comments = $r->custom_comment;
                }else if($data_service->type == 'comment_likes') {
                    $username = $r->username;
                }




                $api = API::find($data_service->provider->api->id);

                // Build api request parameters
                $params = [];
                $apiRequestParams = ApiRequestParam::where(['api_id' => $api->id, 'api_type' => 'order'])->get();
                if (!$apiRequestParams->isEmpty()) {
                    foreach ($apiRequestParams as $row) {
                        if ($row->param_type === 'custom') {
                            $params[$row->param_key] = $row->param_value;
                        } else {
                            // If column is package id then assign package id value in api mapping
                            if ($row->param_value == 'custom_comments' && $data_service->type == 'custom_comment') {
                                    $params[$row->param_key] = $r->custom_comment;
                            } elseif ($row->param_value == 'username' && $data_service->type == 'comment_likes') {

                                $params[$row->param_key] = $r->username;
                            } elseif ($row->param_value == 'id') {
                                $params[$row->param_key] = $data_service->pid;
                            } elseif ($row->param_value == 'target') {
                                $params[$row->param_key] = $post_link;
                            } elseif ($row->param_value == 'quantity') {
                                $params[$row->param_key] = $post_quantity;
                            }
                        }
                    }
                    // create new client and make call
                    $client = new Client();
                    try {
                        // if Method is GET then change request key in Guzzle
                        $param_key = 'form_params';
                        if ($api->order_method === 'GET') {
                            $param_key = 'query';
                        }

                        $res = $client->request($api->order_method, $api->order_end_point, [
                            $param_key => $params,
                            'headers' => ['Accept' => 'application/json'],
                        ]);

                        if ($res->getStatusCode() === 200) {
                            $resp = $res->getBody()->getContents();
                            $json_result = json_decode($resp, true);
                            $poid = SearchKey::arraySearch($json_result, $api->order_id_key);
                            // dd($api->order_success_response);
                            // Response keys are equal to success response?
                            if ($poid) {
                                // Get orderID column from API response

                                $order = new Order;
                                $order->poid = $poid;
                                $order->user_id = Auth::user()->id;
                                $order->service_id = $data_service->id;
                                $order->target = $post_link;
                                $order->quantity = $post_quantity;
                                $order->start_count = 0;
                                $order->remains = $post_quantity;
                                $order->price = $total_price;
                                $order->status = 'Pending';
                                $order->place_from = 'WEB';
                                $order->notes = "Mass Order";
                                $order->refund = 0;
                                $order->save();

                                $user->balance = $user->balance - $total_price;
                                $user->save();

                                $balance_history = new Balance_history;
                                $balance_history->user_id = Auth::user()->id;
                                $balance_history->action = "Cut Balance";
                                $balance_history->quantity = $total_price;
                                $balance_history->desc = "Melakukan Pemesanan $data_service->name Dengan Jumlah $post_quantity";
                                $balance_history->save();

                                $activity = new Activity;
                                $activity->user_id = Auth::user()->id;
                                $activity->type = "Order";
                                $activity->description = "Melakukan Pemesanan $data_service->name Dengan Jumlah $post_quantity";
                                $activity->user_agent = $r->header('User-Agent');
                                $activity->ip = $r->ip();
                                $activity->save();

                                ApiResponseLog::create([
                                    'order_id' => $order->id,
                                    'api_id' => $api->id,
                                    'response' => $resp
                                ]);

                                $total_success++;
                            }else{
                                $total_error++;
                            }

                        }

                    } catch
                    (ClientException $e) {
                        $total_error++;

                    }
                }




            }


        }
        session()->flash('success',"<b>Pesanan anda telah diterima </b> <br>Total sukses order: $total_success <br> Total gagal order: $total_error <br> Total harga: ".config('web_config')['CURRENCY_CODE']." ".Numberize::make($final_price));
        return redirect()->back();
    }

    public function pulsa(){
        $data['pendingprocessing'] = Order::where('user_id',Auth::user()->id)->whereIn('status',['Pending','Processing'])->count();
        $data['used_balance'] = Balance_history::where('user_id',Auth::user()->id)->where('action','Cut Balance')->sum('quantity');
        $data['balance_usage_thismo'] = Balance_history::where('user_id',Auth::user()->id)->whereRaw('MONTH(created_at) = '.Carbon::now()->format('m'))->sum('quantity');
        $data['balance_usage_lastmo'] = Balance_history::where('user_id',Auth::user()->id)->whereRaw('MONTH(created_at) = '.Carbon::now()->subMonth()->format('m'))->sum('quantity');
        $data['total_order_thismo'] = Order::whereRaw('MONTH(created_at) ='.Carbon::now()->format('m'))->where('user_id',Auth::user()->id)->count();
        $data['total_order_lastmo'] = Order::whereRaw('MONTH(created_at) ='.Carbon::now()->subMonth()->format('m'))->where('user_id',Auth::user()->id)->count();
        if($data['total_order_thismo']==0 && $data['total_order_lastmo'] ==0){
            $data['order_percentage'] = $data['total_order_thismo'];
            $data['total_order_thismo'] = 0;
            $data['total_order_lastmo'] = 0;
        }else{
            $data['order_percentage'] = ($data['total_order_thismo'] / ($data['total_order_lastmo']!=0?:1) == 1 ? 0 : ($data['total_order_thismo']/($data['total_order_lastmo']!=0?:1))*100);

        }
        if($data['balance_usage_thismo']==0 && $data['balance_usage_lastmo']==0){
            $data['balance_percentage'] = 0;
        }else{
            $data['balance_percentage'] = ($data['balance_usage_thismo']/($data['balance_usage_lastmo'] != 0?:1))*100;
        }
        $news = News::orderByDesc('id')->get();
        $cat = Service_cat::where('type','PULSA')->where('status','Active')->get();
        // return view('order.pulsa.new',$data, compact('cat','news'));
        return redirect('/order/sosmed');
    }
    public function pulsa_order(Request $r){
        $r->validate([
            'service' => 'required|exists:services_pulsas,id',
            'target' => 'required',
        ]);

        $service = $r->service;
        $target = $r->target;

        $service_pulsa = Services_pulsa::find($service);
        $code = $service_pulsa->code;
        $name = $service_pulsa->name;
        $price = $service_pulsa->price + $service_pulsa->keuntungan;
        $api_id = $service_pulsa->provider->api_id;
        $provider_name = $service_pulsa->provider->name;
        $provider_link = $service_pulsa->provider->link;
        $provider_key = $service_pulsa->provider->key;

        if(Auth::user()->balance < $price) {
            Alert::error('Saldo tidak cukup','Gagal');
            session()->flash('danger','Gagal: Saldo tidak cukup');
            return redirect()->back();
        }


        $poid = 'PULSA'.sprintf('%04d', (Orders_pulsa::count() + 1)).'-'.date('YmdHis');

        $params = [
            'api_key' => 'b6a3da0c-7f62-5ba9-999d-97e7111400fe',
            'refid' => $poid,
            'buyer_sku_code' => $code,
            'customer_no' => $target
        ];

        if(isset($r->pln))
        {
            $params['commands'] = 'pay-pasca';
        }

        $create_order_api = OrderPulsa::digiflazz($params);
            
        // echo "anjerrrr";exit;
        // dd($create_order_api);
        // foreach($ApiRequestParam as $key => $value) {
        //     if($value == 'portalpulsa_inquiry') {
        //         $inq = "I";
        //         if(isset($r->pln)) {
        //             $inq = "PLN";
        //         }
        //         $data[$key] = $inq;
        //     }else if($value == 'nometer_pln') {
        //         if(isset($r->pln)) {
        //             $data[$key] = $r->pln;
        //         }
        //     }else if($value == 'service_id') {
        //         $data[$key] = $code;
        //     }else if($value == "phone"){
        //         $data[$key] = $target;
        //     }else if($value == "portalpulsa_trxid"){
        //         $poid = rand(100000,10000000);
        //         $data[$key] = $poid;
        //     }else if($value == "portalpulsa_no"){
        //         $no = 1;
        //         $check = Orders_pulsa::where('data',$target)->where('created_at',Carbon::today()->format('Y-m-d'))->first();
        //         if($check) {
        //             $no += 1;
        //         }
        //         $data[$key] = $no;
        //     }else{
        //         $data[$key] = $value;
        //     }
        // }
        // dd($data);

        // Response keys are equal to success response?
        if ($poid && $create_order_api && in_array($create_order_api->data->rc, ['03', '00'])) {
            // Get orderID column from API response
            $admin_fee = isset($create_order_api->data->admin) ? $create_order_api->data->admin : 0;
            $order = new Orders_pulsa;
            $order->oid = $poid;
            $order->poid = $poid;
            $order->user_id = Auth::user()->id;
            $order->service_id = $service_pulsa->id;
            $order->price = $price + $admin_fee;
            $order->data = $target;
            $order->sn = isset($create_order_api->data->sn) ? $create_order_api->data->sn : '';
            $order->status =  $create_order_api->data->rc == "00" ? 'Success' : 'Pending';
            $order->place_from = 'WEB';
            $order->refund = 0;
            $order->save();

            $user = User::find(Auth::user()->id);
            $user->balance = $user->balance - ($price + $admin_fee);
            $user->save();

            $balance_history = new Balance_history;
            $balance_history->user_id = Auth::user()->id;
            $balance_history->action = "Cut Balance";
            $balance_history->quantity = $price + $admin_fee;
            $balance_history->desc = "Melakukan Pemesanan $name ".config('web_config')['CURRENCY_CODE']." $price (Order ID: $poid)";
            $balance_history->save();

            $activity = new Activity;
            $activity->user_id = Auth::user()->id;
            $activity->type = "Order";
            $activity->description = "Melakukan Pemesanan $name ".config('web_config')['CURRENCY_CODE']." $price (Order ID: $poid)";
            $activity->user_agent = $r->header('User-Agent');
            $activity->ip = $r->ip();
            $activity->save();

            ApiResponseLog::create([
                'order_id' => $order->id,
                'api_id' => $api_id,
                'response' => json_encode($create_order_api)
            ]);

            Alert::success('Sukses melakukan pemesanan!','Sukses');
            session()->flash('success','<b>Pesanan telah diterima!</b> <br> <b>Layanan</b>: '.$name.' <br> <b>Harga:</b> '.config('web_config')['CURRENCY_CODE'].' '.Numberize::make($price).'<br><b>Tujuan:</b> '.$target);
            return redirect()->back();
        }else{
            Alert::error('Layanan tidak tersedia','Error');
            session()->flash('danger',"Error: Layanan tidak tersedia");
            return redirect()->back();
        }
    }
    public function pulsa_history(Request $r){
        $search = $r->get('search');
        $order = Orders_pulsa::where('user_id',auth()->user()->id)->where(function($q) use ($r, $search) {
             $q->where('data','LIKE',"%$search%")
            ->orWhere('id','LIKE',"%$search%");
        })->orderBy('id','desc')->simplePaginate(10);
        // return view('order.pulsa.history', compact('order'));
        return redirect('/order/sosmed');
    }
    public function get_service_pulsa(Request $r){
        $id = $r->id;

        $operators = Oprator::where('category_id',$id)->get();
        $hasil = "<option value=''>Pilih salah satu..</option>";
        foreach($operators as $operator) {
            $id = $operator->id;
            $name = $operator->name;
            $hasil .= "<option value='$id'>$name</option>";
        }
        return $hasil;
    }
    public function get_type_pulsa(Request $r){
        $id = $r->id;

        $services = Services_pulsa::where('oprator_id',$id)->get();

        if(empty($services)) {
            return "<option>Layanan belum tersedia</option>";
        }
        $hasil = "<option value=''>Pilih salah satu..</option>";
        foreach($services as $service) {
            $id = $service->id;
            $name = $service->name;

            $hasil .= "<option value='$id'>$name</option>";
        }
        return $hasil;
    }

    public function get_price_pulsa(Request $r) {
        $id = $r->id;
        $service = Services_pulsa::find($id);
        return response()->json([
            'price' => $service->price+$service->keuntungan,
            'desc' => $service->desc
        ]);

    }

    public function tos() {
        $news = News::orderByDesc('id')->get();
        return view('order.sosmed.tos',compact('news'));
    }

    public function invoice($id) {
        $order = Order::findOrFail($id);
        $custom_price = Custom_price::where('service_id', $order->service_id)->where('user_id',Auth::user()->id)->first();
        if($custom_price) {
            $order->service->price  -= $custom_price->potongan;
        }
        $news = News::orderByDesc('id')->get();
        return view('order.sosmed.invoice', compact('order','news'));
    }

}
