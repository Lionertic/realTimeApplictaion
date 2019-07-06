<?php

namespace App\Http\Controllers;

use App\Events\NewMessage;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ChatController extends Controller
{
    public function getMessages(){
        $userId = Auth::id();
        $messages = Message::where('from_id',$userId)->orWhere('to_id',$userId)->get();
        return $messages;
    }

    public function sendMEssage(Request $request){
        $message = new Message();
        $content = request('message');
        $message->text = $content;
        if(Auth::id() == 1) {
            $message->from_id = 1;
            $message->to_id = 2;
        } else {
            $message->from_id = 2;
            $message->to_id = 1;
        }
        $message->save();
        event(new NewMessage($message));
        return $message;
    }
}
