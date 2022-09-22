<?php

use Illuminate\Support\Facades\Auth;

    function convert($money){
        if(Auth::user()->bahasa == 'en')
        return "$ ".round($money/15000,2); //ROUND UNTUK MEMBULATKAN DECIMAL. ROUND($MONEY,2)
        else
        return "Rp ".$money;
    }

    function convert3($money){
        if(Auth::user()->bahasa == 'en')
        return round($money/15000,2);
        else
        return $money;
    }

    // UNTUK NOMINAL YANG MENGGUNAKAN TANDA (.) -> Contoh : 15.000
    // function convert($money){
    //     if(Auth::user()->bahasa == 'en')
    //     return "$ ".round($money/15.000,2); //ROUND UNTUK MEMBULATKAN DECIMAL. ROUND($MONEY,2)
    //     else
    //     return "Rp ".$money;
    // }
    // UNTUK NOMINAL YANG TIDAK MENGGUNAKAN TANDA (.) -> Contoh : 15000
    // function convert2($money){
    //     if(Auth::user()->bahasa == 'en')
    //     return "$ ".round($money/15000,2); //ROUND UNTUK MEMBULATKAN DECIMAL. ROUND($MONEY,2)
    //     else
    //     return "Rp ".$money;
    // }

    function get_balance_bahasa($money) {
        return auth()->user()->bahasa == "en" ? ($money * 15000) : $money;
    }

