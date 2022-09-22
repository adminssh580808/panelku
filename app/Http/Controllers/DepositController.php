<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Deposit;
use App\News;
use Auth;
use Alert;
use App\Activity;
use App\Deposit_method;
use App\Helpers\Numberize;

class DepositController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function index(){}
    public function deposit(){
        $deposit = Deposit::where('user_id', auth()->user()->id)->orderBy('id','desc')->paginate(10);
        $news = News::orderByDesc('id')->get();
        return view('deposit.new', compact('deposit','news'));
    }
    public function deposit_add(Request $r){
        $type = $r->type;
        $method = $r->method;
        $sender = $r->sender;
        $quantity = get_balance_bahasa($r->quantity);

        $r->validate([
            'type' => 'required',
            'method' => 'required|exists:deposit_methods,id',
            'sender' => 'required|string',
        ]);

        if($quantity < 5000)
            return redirect()->back()->with('danger','Quantity minimal '.(auth()->user()->bahasa == "en" ? (5000 / 15000) : "5000"));

        $count_deposit = Deposit::where('user_id',Auth::user()->id)->where('status','Pending')->count();
        if($count_deposit >= 3) {
            session()->flash('danger','<b>Gagal: </b>Kamu mempunyai '.$count_deposit.' deposit yang belum diselesaikan. Silahkan selesaikan terlebih dahulu.');
            return redirect()->back();
        }

        $check = Deposit_method::find($method);
        $rate = $check->rate;
        $data = $check->data;
        $note = $check->note;

        if( $check->type == 'AUTO'){
            if($check->code == 'pulsa') {
                if(substr($sender,0,1) == 0) {
                    $sender = "62".substr($sender,1);
                }
                $send_quantity = $quantity;
            }else{
                $unique = rand(0,2000);
                $send_quantity = $quantity + $unique;
            }
            $get_balance = $send_quantity * $rate;
        }else{
            $get_balance = $quantity * $rate;
            $send_quantity = $quantity;
        }




        $deposit = new Deposit;
        $deposit->user_id = Auth::user()->id;
        $deposit->quantity = $send_quantity;
        $deposit->sender = $sender;
        $deposit->get_balance = $get_balance;
        $deposit->method = $method;
        $deposit->status = "Pending";
        $deposit->save();

        $activity = new Activity;
        $activity->user_id = Auth::user()->id;
        $activity->type = "Deposit";
        $activity->description = "Membuat permintaan deposit sebesar ".config('web_config')['CURRENCY_CODE']." ".$send_quantity;
        $activity->user_agent = $r->header('User-Agent');
        $activity->ip = $r->ip();
        $activity->save();

        if($type == 'Manual'){
            session()->flash('success',"<b>Permintaan deposit diterima</b><br> <b>Tujuan transfer:</b> $data $note <br><b>  Nominal transfer: </b>".convert($send_quantity)."<br> <b>Dapat saldo:</b> ".convert($get_balance)."<br>Jika sudah melakukan transfer silahkan tunggu 5-10 menit saldo akan masuk. Jika belum masuk juga silahkan klik tombol hubungi kami. Riwayat deposit akan otomatis tercancel jika 4 jam belum transfer");
            Alert::success('Sukses membuat deposit','Sukses!');
            return redirect()->route('deposit_invoice',$deposit->id);
        }else{
            session()->flash('success',"<b>Permintaan deposit diterima</b><br> <b>Tujuan transfer:</b> $data $note <br><b>  Nominal transfer: </b>".convert($send_quantity)."<br> <b>Dapat saldo:</b> ".convert($get_balance)."<br><br>NOTE<br>Jika sudah melakukan transfer silahkan tunggu 5-10 menit & saldo akan masuk. Jika belum masuk juga silahkan klik tombol hubungi kami. <br> Riwayat deposit akan otomatis tercancel jika 4 jam belum transfer");
            Alert::success('Sukses membuat deposit','Sukses!');
            return redirect()->route('deposit_invoice',$deposit->id);
        }

    }
    public function history(){
    	$deposit = Deposit::where('user_id', auth()->user()->id)->orderBy('id','desc')->paginate(10);
        $news = News::orderByDesc('id')->get();
    	return view('deposit.history', compact('deposit','news'));
    }

    public function cancel_deposit(Request $r) {
        $id = $r->id;

        $deposit = Deposit::find($id);
        $deposit->status = 'Canceled';
        $deposit->save();
        Alert::success('Sukses membatalkan deposit!', 'Sukses!');
        return redirect()->back();
    }



    public function get_method(Request $r) {
        $type = $r->type;
        $r->validate([
            'type' => 'required'
        ]);

        $method = Deposit_method::where('type',$type)->where('status','Active')->get();
        $res = "<option value=''>".__('Pilih salah satu..')."</option>";
        foreach($method as $metode) {
            $id_method = $metode->id;
            $name = $metode->name;
            $res .= "<option value='$id_method'>$name</option>";
        }
        return $res;
    }

    public function invoice($id) {
        $deposit = Deposit::findOrFail($id);
        if($deposit->user_id != Auth::user()->id)
        {
            return back();
        }
        $news = News::orderByDesc('id')->get();
        return view('deposit.invoice', compact('deposit','news'));
    }

    public function get_rate(Request $r) {
        $method = $r->method;
        $select = Deposit_method::find($method);
        $money = $r->quantity * $select->rate;
        return auth()->user()->bahasan == "en" ? ($money / 15000) : $money;
    }
}
