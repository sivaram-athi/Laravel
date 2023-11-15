<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;

class Trend extends Model
{
    //
    protected $table = 'amazon_trends';
    protected $guarded = [];

    public function prod(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
