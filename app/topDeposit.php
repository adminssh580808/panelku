<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class topDeposit extends Model
{
    protected $fillable = [
        'name1','total1','name2','total2','name3','total3','name4','total4','name5','total5',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
