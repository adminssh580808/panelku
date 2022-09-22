<?php

namespace App\Http\Controllers;

use App\PageCategory;
use Illuminate\Http\Request;

class PageCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('developer.bahasa.page.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('developer.bahasa.page.add');
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
            'nama'=>'required',
        ]);

        $nama = $request->nama;

        $page = new PageCategory;
        $page->nama = $nama;
        $page->save();

        session()->flash('success','Sukses tambah kategori!');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PageCategory  $pageCategory
     * @return \Illuminate\Http\Response
     */
    public function show(PageCategory $pageCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PageCategory  $pageCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(PageCategory $pageCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PageCategory  $pageCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PageCategory $pageCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PageCategory  $pageCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(PageCategory $pageCategory)
    {
        //
    }
}
