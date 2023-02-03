<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Abraham\TwitterOAuth\TwitterOAuth;
use Illuminate\Http\Request;

class TwitterController extends Controller
{
    // 投稿
    public function tweet(Request $request)
    {
        $twitter = new TwitterOAuth(env('TWITTER_CLIENT_ID'),
            env('TWITTER_CLIENT_SECRET'),
            env('TWITTER_CLIENT_ID_ACCESS_TOKEN'),
            env('TWITTER_CLIENT_ID_ACCESS_TOKEN_SECRET'));

        $twitter->post("statuses/update", [
            "status" =>
                'テスト'
        ]);
    }
}
