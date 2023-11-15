<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

trait Followable
{
    public function follow(User $user)
    {
        return $this->follows()->save($user);
    }

    public function unfollow(User $user)
    {
        return $this->follows()->detach($user);
    }

    public function toggleFollow(User $user)
    {
       $this->follows()->toggle($user);
    }

    public function follows()
    {
        return $this->belongsToMany(User::class, 'twitter_follows', 'user_id', 'following_user_id');
    }

    public function following(User $user)
    {
        if($this->follows()->where('following_user_id', $user->id)->where('request',0)->exists()){
            return 'requested';
        }
        else if ($this->follows()->where('following_user_id', $user->id)->where('request', 1)->exists()) {
            return 'following';
        }
        else{
            return 'follow';
        }
    }
    public function followers(){
        return $this->belongsToMany(User::class, 'twitter_follows', 'user_id', 'following_user_id')->where('request',1);
    }
    public function requests()
    {
        return $this->belongsToMany(User::class, 'twitter_follows', 'following_user_id')->where('request', 0);
    }
}
