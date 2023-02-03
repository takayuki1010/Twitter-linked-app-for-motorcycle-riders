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
    public function store(Post $post) {
        $post->useriine()->attach(Auth::id());

        return redirect()->route('list');
    }

    public function destroy(Post $post) {
        $post->useriine()->detach(Auth::id());

        return redirect()->route('list');
    }
}

