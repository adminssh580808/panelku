<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class topGiveAway extends Model
{
    protected $fillable = [
        'name1','code1','total1','name2','code2','total2','name3','code3','total3','name4','code4','total4','name5','code5','total5',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
