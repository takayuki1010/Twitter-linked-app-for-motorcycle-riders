<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Like;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    //
    public function store(Message $post) {
        $post->useriine()->attach(Auth::id());

        return redirect()->route('/detail/{id}');
    }

    public function destroy(Message $post) {
        $post->useriine()->detach(Auth::id());

        $messages = Message::id();

        return redirect()->route('/detail/{id}');
    }
}

