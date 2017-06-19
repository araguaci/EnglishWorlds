<?php

namespace English\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use English;

class ChatController extends Controller
{
    public function send(Request $request)
    {
        $chat = new English\Chat();
        $chat->id = uniqid();
        $chat->sender_id = Auth::user()->id;
        $chat->reciever_id = $request->correspondent;
        $chat->message = $request->message;
        $chat->seen = 0;
        $chat->save();
        $this->update($request);
        return null;
    }

    public function update(Request $request)
    {
        $messages = array();
        $data = English\Chat::where('reciever_id', Auth::user()->id)
        ->where('sender_id', $request->correspondent)
        ->where('seen', 0)
        ->get();
        foreach ($data as $key ) {
            $messages[] = $key->message;
        }
        English\Chat::where('reciever_id', Auth::user()->id)
        ->where('sender_id', $request->correspondent)
        ->where('seen', 0)
        ->update(['seen' => 1]);
        return $messages;
    }

    public function show($correspondent)
    {
        $data = English\Chat::where('sender_id', Auth::user()->id)->where('reciever_id', $correspondent)
        ->orwhere('sender_id', $correspondent)->where('reciever_id', Auth::user()->id)
        ->orderBy('created_at', 'asc')
        ->get();
        return view('chat/show', ['data' => $data, 'correspondent' => $correspondent]);
    }
}
