<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Abraham\TwitterOAuth\TwitterOAuth;

class TwitterController extends Controller
{
    // 投稿
    public function tweet(Request $request)
    {
        $twitter = new TwitterOAuth(env('TWITTER_CONSUMER_KEY'),
            env('TWITTER_CONSUMER_SECRET'),
            env('TWITTER_ACCESS_TOKEN'),
            env('TWITTER_ACCESS_SECRET'));

        $twitter->post("statuses/update", [
            "status" =>
            'tesuto'
        ]);

        return redirect()->route('list.index');
    }
}