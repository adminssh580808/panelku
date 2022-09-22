<?php

use App\Orders_pulsa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/callback-digiflazz',function(){
    $data = request()->all()['data'];
    Log::info(request()->all());
    $status = [
        'Pending' => 'Pending',
        'Sukses' => 'Success',
        'Gagal' => 'Error'
    ];

    $get_order = Orders_pulsa::where('poid',$data['ref_id'])
    ->where('status','Pending')->first();

    if($get_order == null)
        return response()->json([
            'status' => 'error',
            'message' => 'Order tidak ditemukan'
        ],404);

    $status = $status[$data['status']];

    if($status == "Error")
    {
        $get_order->user->increment('balance',$get_order->price);
        $get_order->update([
            'status' => $status,
        ]);
        return response()->json([
            'status' => 'error',
            'message' => 'Transaksi status gagal !'
        ]);
    }

    // cek dan update data
    $get_order->update([
        'status' => $status,
        'sn' => $data['sn'],
    ]);


    return response()->json([
        'status' => true,
        'message' => 'success'
    ],200);

});
