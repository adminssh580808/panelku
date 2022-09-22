<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageBahasa extends Model
{
    protected $fillable =
    [
        'page_categories_id',
        'indonesia',
        'english',
    ];

    public function bahasa(){
        return $this->belongsTo('App\Page\Category', 'page_categories_id');
    }
}
