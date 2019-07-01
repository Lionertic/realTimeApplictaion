<?php

namespace App\Http\Controllers;

use App\Events\NewMessage;
use App\Message;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function getMessages(){
        $messages = Message::take(200)->pluck('text');
        return $messages;
    }

    public function sendMEssage(Request $request){
        $message = new Message();
        $content = request('message');
        $message->text = $content;
        $message->save();
        event(new NewMessage($content));
        return $content;
    }
}
