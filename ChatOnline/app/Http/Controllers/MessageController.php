<?php

namespace App\Http\Controllers;


use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MessageController extends Controller
{
    public function index(Request $request)
    {
        $messages = Message::get();
        $users = User::get();
        return view('onlineChat.message', ['messages' => $messages, 'users' => $users]);
    }

    public function create(Request $request)
    {

        /*$message =  Message::create([
            'message' => $request->input('message'),
            'sender_id' => Auth::id(),
            'recipient_id' => $request->input('recipient_id')
        ]);*/
        /*dd(auth()->user()->id);*/
        $message = new Message();
        $message->message = $request->input('message');
        $message->sender_id = auth()->user()->id;
        $message->recipient_id = $request->input('recipient_id');
        $message->save();
        return redirect()->route('message');
    }

    public function sendMessageUser($id)
    {
        $messages = Message::where(function ($messages) use ($id) {
            $messages->where('sender_id', $id)->where('recipient_id', auth()->user()->id);
        })->orWhere(function ($messages) use ($id) {
            $messages->where('recipient_id', $id)->where('sender_id', auth()->user()->id);
        })->orderBy('created_at')->get();
        $users = User::get();
        $user = User::where('id', $id)->get();
       /* dd($user);*/
        return view('onlineChat.message', ['messages' => $messages, 'users' => $users, 'user' => $user]);
    }

}
