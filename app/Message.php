<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Message extends Model
{
    protected $table = 'twitter_messages';
    protected $guarded = [];

    public function message()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
