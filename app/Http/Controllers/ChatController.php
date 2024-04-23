<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index(){
        return view('chat');
    }


    public function dispatch(Request $request){

        MessageSent::dispatch(auth()->user()->name,  $request->message);
        return response('OK', 200);
    }

}
