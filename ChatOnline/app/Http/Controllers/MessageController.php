<?php

namespace App\Http\Controllers;


use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::get();
        $users = User::get();
        return view('onlineChat.message', ['messages' => $messages, 'users' => $users]);
    }
    /*public function indexAfterSendMessage($id ){
        $messages = Message::get();
        $users = User::get();
        $user_id = User::find($id);
        return view('onlineChat.message', ['user_id' => $user_id]);
    }*/

    public function create($id, Request $request)
    {
        $user = User::find($id);
        $message = new Message();
        $message->message = $request->input('message');
        $message->sender_id = Auth::user()->id;
        $message->recipient_id = $user->id;
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
        $user = User::find($id);
        /*dd($user->id);*/
        return view('onlineChat.message', ['messages' => $messages, 'users' => $users, 'user_id' => $user]);
    }


}
