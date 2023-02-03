<?php

namespace App\UserFunctions;

use Abraham\TwitterOAuth\TwitterOAuth;
use DateTime;
use DateTimeZone;
use Exception;
use Illuminate\Support\Facades\Log;

class TwitterManager
{

    private const TWITTER_API_KEY = "mjZSFwY2W1IrwLFuhbM430jaw";
    private const TWITTER_API_SECRET_KEY = "a5vxQDLISp2VWscAkBRNB7wZkXuJqmZNAbbr1JsITeXH3sjLA1";
    private const TWITTER_CLIENT_ID_ACCESS_TOKEN = "1607706323139055616-mA8B78ylqVpWNuBdOKeCS9gMQqgMHk";
    private const TWITTER_CLIENT_ID_ACCESS_TOKEN_SECRET = "0EpTrIEK9j7zAVlnJGOonTzCNBHpBYRov4uI0ro6MCQiM";


    // 投稿
    public function tweet()
    {
        $twitter = new TwitterOAuth(env('TWITTER_CLIENT_ID'),
                    env('TWITTER_CLIENT_SECRET'),
                    env('TWITTER_CLIENT_ID_ACCESS_TOKEN'),
                    env('TWITTER_CLIENT_ID_ACCESS_TOKEN_SECRET'));




        $message = <<<EOT
                          テスト投稿
                          EOT;


        $ret = $twitter->post("statuses/update", [
            "status" =>$message]);
        var_dump(json_decode(json_encode($ret,320), true, 320)['errors'][0]['message']);
            }


        $ret = $twitter->post("statuses/update", [
            "status" =>$message]);
        var_dump(json_decode(json_encode($ret,320), true, 320)['errors'][0]['message']);
    }
