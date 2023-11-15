<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'twitter_likes';
    protected $guarded = [];
}
