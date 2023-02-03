<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    //
    public function store(Post $post) {
        $post->users()->attach(Auth::id());

        return redirect()->route('detail');
    }

    public function destroy(Post $post) {
        $post->users()->detach(Auth::id());

        return redirect()->route('detail');
    }
}

