<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\News;
use App\Service_cat;
use App\Services_pulsa;

class PriceController extends Controller
{

    public function sosmed(Request $r) {
        $category = Service_cat::all();
    	$search = $r->get('search');
    	$service = Service::orderBy('category_id','asc')->where('name','LIKE',"%$search%")->paginate(1000);
    	$service->appends($r->only('search'));
    	$news = News::orderByDesc('id')->get();
    	return view('price.sosmed', compact('service','category','news'));
    }

    public function pulsa(Request $r) {
    	$search = $r->get('search');
    	$service = Services_pulsa::orderBy('id','asc')->where('name','LIKE',"%$search%")->paginate(70);
    	$service->appends($r->only('search'));
    	$news = News::orderByDesc('id')->get();
    	return view('price.pulsa', compact('service','news'));
    }

    public function detail_ajax(Request $r) {
        $sid = $r->service_id;
        $r->validate(['service_id'=>'required|exists:services,id']);

        $service = Service::find($sid);
        return response()->json([
            'name' => $service->name,
            'category' => $service->category->name,
            'note' => $service->note,
            'min' => $service->min,
            'max' => $service->max,
            'price' => $service->price+$service->keuntungan,
            'price_oper' => $service->price_oper+$service->keuntungan,
            'type' => $service->type,
            'status' => $service->status
        ],200);
    }


}
