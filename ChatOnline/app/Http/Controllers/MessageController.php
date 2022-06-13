<?php

namespace App\Http\Controllers;


use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MessageController extends Controller
{
    public function index(Request $request){
        $messages = Message::get();
        return view('onlineChat.message', ['messages' => $messages]);
    }
    public function create(Request $request){

        $user =  Message::create([
            'message' => $request->message,
            'sender_id' => Auth::id(),
            'recipient_id' => '2'
        ]);
        $messages = Message::get();
        return redirect()->route('message');
    }


}
