<?php

namespace App\Http\Controllers;


use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\ResponseFactory;

class MessageController extends Controller
{
    public function index(Request $request){
        $messages = Message::get();
        if(Auth::check()){
            return view('welcome', ['messages' => $messages]);
        }
        return response('login');
    }
    public function create(Request $request){
        $user =  Message::create([
            'message' => $request->input('message'),
        ]);
        $messages = Message::get();
        return redirect()->route('message', compact('messages'));
    }
}
