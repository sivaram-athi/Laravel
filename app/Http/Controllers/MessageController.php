<?php

namespace App\Http\Controllers;

use App\Message;
use App\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function message(User $user){
        $messages = Message::where([['following_user_id', '=', $user->id], ['user_id', '=', auth()->id()]])
            ->orWhere([['user_id', '=', $user->id], ['following_user_id', '=', auth()->id()]])->orderBy('created_at', 'ASC')
            ->get();
        return view('message',["user"=>$user, 'messages' => $messages]);
    }

    public function store(Request $request)
    {
        // dd($request->msg);
        $attribute = Request()->validate(['msg' => 'required|max:255']);
        Message::create([
            'user_id' => auth()->id(),
            'following_user_id'=>$request->id,
            'msg' => $attribute['msg']
        ]);
        return back();
    }
}
