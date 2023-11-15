<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Category extends Model
{
    //
    protected $table = "amazon_categories";

    protected $guarded = [];

    public function product(){
        return $this->hasMany(Product::class)->limit(4);
    }
}
