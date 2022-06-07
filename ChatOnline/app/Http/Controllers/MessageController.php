<?php

namespace App\Http\Controllers;


use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(Request $request){
        $messages = Message::get();
        return view('message', ['messages' => $messages]);
    }
    public function create(Request $request){
        $user =  Message::create([
            'message' => $request->input('message'),
        ]);
        $messages = Message::get();
        return redirect()->route('message', compact('messages'));
    }
}
