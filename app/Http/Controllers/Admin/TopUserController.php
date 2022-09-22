<?php

namespace App\Http\Controllers\Admin;

use App\TopUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\topDeposit;
use App\topGiveAway;
use App\topOrder;
use Illuminate\Foundation\Auth\User;

class TopUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $top_order = topOrder::all();
        $top_deposit = topDeposit::all();
        $top_giveaway = topGiveAway::all();
        return view('developer.configuration.topuser.index',compact('top_order','top_deposit','top_giveaway'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    // TOP ORDER
    public function top_order() // CREATE
    {
        $users = User::where('level','Admin')->get();
        return view('developer.configuration.topuser.toporder.add',compact('users'));
    }
    public function add_toporder(Request $request) //STORE
    {
        $request->validate([
            'name1'=>'required',
            'total1'=>'required',
            'name2'=>'required',
            'total2'=>'required',
            'name3'=>'required',
            'total3'=>'required',
            'name4'=>'required',
            'total4'=>'required',
            'name5'=>'required',
            'total5'=>'required',
        ]);

        $name1 = $request->name1;
        $total1 = $request->total1;
        $name2 = $request->name2;
        $total2 = $request->total2;
        $name3 = $request->name3;
        $total3 = $request->total3;
        $name4 = $request->name4;
        $total4 = $request->total4;
        $name5 = $request->name5;
        $total5 = $request->total5;

        $top = new topOrder;
        $top->name1 = $name1;
        $top->total1 = $total1;
        $top->name2 = $name2;
        $top->total2 = $total2;
        $top->name3 = $name3;
        $top->total3 = $total3;
        $top->name4 = $name4;
        $top->total4 = $total4;
        $top->name5 = $name5;
        $top->total5 = $total5;
        $top->save();

        session()->flash('success','Sukses tambah kategori!');
        return back();
    }

    public function edit_top_order($id){ // EDIT INDEX
        $top = topOrder::where('id',$id)->first();
        $users = User::all();
        return view('developer.configuration.topuser.toporder.edit', compact('top','users'));
    }
    public function update_top_order(Request $request,$id){
        $request->validate([
            'name1'=>'required',
            'total1'=>'required',
            'name2'=>'required',
            'total2'=>'required',
            'name3'=>'required',
            'total3'=>'required',
            'name4'=>'required',
            'total4'=>'required',
            'name5'=>'required',
            'total5'=>'required',
        ]);

        $name1 = $request->name1;
        $total1 = $request->total1;
        $name2 = $request->name2;
        $total2 = $request->total2;
        $name3 = $request->name3;
        $total3 = $request->total3;
        $name4 = $request->name4;
        $total4 = $request->total4;
        $name5 = $request->name5;
        $total5 = $request->total5;

        $top = topOrder::findOrFail($id);
        $top->name1 = $name1;
        $top->total1 = $total1;
        $top->name2 = $name2;
        $top->total2 = $total2;
        $top->name3 = $name3;
        $top->total3 = $total3;
        $top->name4 = $name4;
        $top->total4 = $total4;
        $top->name5 = $name5;
        $top->total5 = $total5;
        $top->save();

        session()->flash('success','Sukses ubah kategori!');
        return back();
    }

    // TOP DEPOSIT
    public function top_deposit() // CREATE
    {
        $users = User::where('level','Admin')->get();
        return view('developer.configuration.topuser.topdeposit.add', compact('users'));
    }
    public function add_topdeposit(Request $request) //STORE
    {
        $request->validate([
            'name1'=>'required',
            'total1'=>'required',
            'name2'=>'required',
            'total2'=>'required',
            'name3'=>'required',
            'total3'=>'required',
            'name4'=>'required',
            'total4'=>'required',
            'name5'=>'required',
            'total5'=>'required',
        ]);

        $name1 = $request->name1;
        $total1 = $request->total1;
        $name2 = $request->name2;
        $total2 = $request->total2;
        $name3 = $request->name3;
        $total3 = $request->total3;
        $name4 = $request->name4;
        $total4 = $request->total4;
        $name5 = $request->name5;
        $total5 = $request->total5;

        $top = new topDeposit;
        $top->name1 = $name1;
        $top->total1 = $total1;
        $top->name2 = $name2;
        $top->total2 = $total2;
        $top->name3 = $name3;
        $top->total3 = $total3;
        $top->name4 = $name4;
        $top->total4 = $total4;
        $top->name5 = $name5;
        $top->total5 = $total5;
        $top->save();

        session()->flash('success','Sukses tambah kategori!');
        return back();
    }

    public function edit_top_deposit($id){ // EDIT INDEX
        $top = topDeposit::where('id',$id)->first();
        $users = User::all();
        return view('developer.configuration.topuser.topdeposit.edit', compact('top','users'));
    }
    public function update_top_deposit(Request $request,$id){
        $request->validate([
            'name1'=>'required',
            'total1'=>'required',
            'name2'=>'required',
            'total2'=>'required',
            'name3'=>'required',
            'total3'=>'required',
            'name4'=>'required',
            'total4'=>'required',
            'name5'=>'required',
            'total5'=>'required',
        ]);

        $name1 = $request->name1;
        $total1 = $request->total1;
        $name2 = $request->name2;
        $total2 = $request->total2;
        $name3 = $request->name3;
        $total3 = $request->total3;
        $name4 = $request->name4;
        $total4 = $request->total4;
        $name5 = $request->name5;
        $total5 = $request->total5;

        $top = topDeposit::findOrFail($id);
        $top->name1 = $name1;
        $top->total1 = $total1;
        $top->name2 = $name2;
        $top->total2 = $total2;
        $top->name3 = $name3;
        $top->total3 = $total3;
        $top->name4 = $name4;
        $top->total4 = $total4;
        $top->name5 = $name5;
        $top->total5 = $total5;
        $top->save();

        session()->flash('success','Sukses ubah kategori!');
        return back();
    }

    // TOP GIVEAWAY
    public function top_giveaway() // CREATE
    {
        $users = User::where('level','Admin')->get();
        return view('developer.configuration.topuser.topgiveaway.add',compact('users'));
    }
    public function add_topgiveaway(Request $request) //STORE
    {
        $request->validate([
            'name1'=>'required',
            'code1'=>'required',
            'total1'=>'required',
            'name2'=>'required',
            'code2'=>'required',
            'total2'=>'required',
            'name3'=>'required',
            'code3'=>'required',
            'total3'=>'required',
            'name4'=>'required',
            'code4'=>'required',
            'total4'=>'required',
            'name5'=>'required',
            'code5'=>'required',
            'total5'=>'required',
        ]);

        $name1 = $request->name1;
        $code1 = $request->code1;
        $total1 = $request->total1;
        $name2 = $request->name2;
        $code2 = $request->code2;
        $total2 = $request->total2;
        $name3 = $request->name3;
        $code3 = $request->code3;
        $total3 = $request->total3;
        $name4 = $request->name4;
        $code4 = $request->code4;
        $total4 = $request->total4;
        $name5 = $request->name5;
        $code5 = $request->code5;
        $total5 = $request->total5;

        $top = new topGiveAway;
        $top->name1 = $name1;
        $top->code1 = $code1;
        $top->total1 = $total1;
        $top->name2 = $name2;
        $top->code2 = $code2;
        $top->total2 = $total2;
        $top->name3 = $name3;
        $top->code3 = $code3;
        $top->total3 = $total3;
        $top->name4 = $name4;
        $top->code4 = $code4;
        $top->total4 = $total4;
        $top->name5 = $name5;
        $top->code5 = $code5;
        $top->total5 = $total5;
        $top->save();

        session()->flash('success','Sukses tambah kategori!');
        return back();
    }

    public function edit_top_giveaway($id){ // EDIT INDEX
        $top = topGiveAway::where('id',$id)->first();
        $users = User::all();
        return view('developer.configuration.topuser.topgiveaway.edit', compact('top','users'));
    }
    public function update_top_giveaway(Request $request,$id){
        $request->validate([
            'name1'=>'required',
            'code1'=>'required',
            'total1'=>'required',
            'name2'=>'required',
            'code2'=>'required',
            'total2'=>'required',
            'name3'=>'required',
            'code3'=>'required',
            'total3'=>'required',
            'name4'=>'required',
            'code4'=>'required',
            'total4'=>'required',
            'name5'=>'required',
            'code5'=>'required',
            'total5'=>'required',
        ]);

        $name1 = $request->name1;
        $code1 = $request->code1;
        $total1 = $request->total1;
        $name2 = $request->name2;
        $code2 = $request->code2;
        $total2 = $request->total2;
        $name3 = $request->name3;
        $code3 = $request->code3;
        $total3 = $request->total3;
        $name4 = $request->name4;
        $code4 = $request->code4;
        $total4 = $request->total4;
        $name5 = $request->name5;
        $code5 = $request->code5;
        $total5 = $request->total5;

        $top = topGiveAway::findOrFail($id);
        $top->name1 = $name1;
        $top->code1 = $code1;
        $top->total1 = $total1;
        $top->name2 = $name2;
        $top->code2 = $code2;
        $top->total2 = $total2;
        $top->name3 = $name3;
        $top->code3 = $code3;
        $top->total3 = $total3;
        $top->name4 = $name4;
        $top->code4 = $code4;
        $top->total4 = $total4;
        $top->name5 = $name5;
        $top->code5 = $code5;
        $top->total5 = $total5;
        $top->save();

        session()->flash('success','Sukses ubah kategori!');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TopUser  $topUser
     * @return \Illuminate\Http\Response
     */
    public function show(TopUser $topUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TopUser  $topUser
     * @return \Illuminate\Http\Response
     */
    public function edit(TopUser $topUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TopUser  $topUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TopUser $topUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TopUser  $topUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(TopUser $topUser)
    {
        //
    }
}
