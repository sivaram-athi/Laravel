<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    protected $table = "amazon_carts";

    protected $guarded = [];

    public function product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }

}
