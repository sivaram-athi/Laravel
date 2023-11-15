<?php

namespace App;

use App\Like;
use Illuminate\Database\Eloquent\Model;
use App\User;

class Tweet extends Model
{
    use Likable;
    protected $table ='twitter_tweets';
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }


}
