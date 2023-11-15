<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;

class Buy extends Model
{
    //
    protected $table = 'amazon_buys';
    protected $guarded = [];

    public function products(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
