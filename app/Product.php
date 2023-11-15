<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Product extends Model
{
    //
    protected $table = 'amazon_products';
    protected $guarded = [];
    // 
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
