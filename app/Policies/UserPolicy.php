<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\DB;

class UserPolicy
{
    use HandlesAuthorization;

    public function edit(User $currentUser, User $user)
    {
        return $currentUser->is($user);
    }

    public function check(User $currentUser, User $user)
    {

        if (DB::table('twitter_follows')->where('following_user_id', $user->id)->where('user_id', $currentUser->id)->where('request', 1)->exists()) {
            return true;
        } else {
            return false;
        }
    }
}
