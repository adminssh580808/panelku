<?php

namespace App\Http\Controllers;

use App\PageBahasa;
use App\PageCategory;
use Illuminate\Http\Request;

class PageBahasaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('developer.bahasa.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('developer.bahasa.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'halaman'=>'required',
            'indonesia'=>'required',
            'english'=>'required',
        ]);

        $halaman = $request->halaman;
        $indonesia = $request->indonesia;
        $english = $request->english;

        $bahasa = new PageBahasa;
        $bahasa->halaman = $halaman;
        $bahasa->indonesia = $indonesia;
        $bahasa->english = $english;
        $bahasa->save();

        session()->flash('success','Sukses tambah kategori!');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PageBahasa  $pageBahasa
     * @return \Illuminate\Http\Response
     */
    public function show(PageBahasa $pageBahasa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PageBahasa  $pageBahasa
     * @return \Illuminate\Http\Response
     */
    public function edit(PageBahasa $pageBahasa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PageBahasa  $pageBahasa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PageBahasa $pageBahasa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PageBahasa  $pageBahasa
     * @return \Illuminate\Http\Response
     */
    public function destroy(PageBahasa $pageBahasa)
    {
        //
    }
}
