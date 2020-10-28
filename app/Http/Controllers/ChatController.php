<?php

namespace App\Http\Controllers;

use App\Events\RedisEvent;
use App\Models\Chat;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index() {
        $data = Chat::all();

        return view('chat', compact('data'));
    }

    public function send(Request $request) {
//        $data = Chat::create($request->all());
        $data = Chat::find(45);

        event(
          $e = new RedisEvent($data->content)
        );

        return redirect()->back();
    }
}
