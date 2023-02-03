<?php
// Twitter関係
// namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;
// use Abraham\TwitterOAuth\TwitterOAuth;

// class TwitterController extends Controller
// {
//     // 投稿
//     public function tweet(Request $request)
//     {
//         $twitter = new TwitterOAuth(env('TWITTER_CLIENT_ID'),
//             env('TWITTER_CLIENT_SECRET'),
//             env('TWITTER_CLIENT_ID_ACCESS_TOKEN'),
//             env('TWITTER_CLIENT_ID_ACCESS_TOKEN_SECRET'));

//         $twitter->post("statuses/update", [
//             "status" =>
//                 'New Photo Post!' . PHP_EOL .
//                 '新しい聖地の写真が投稿されました!' . PHP_EOL .
//                 'タイトル「' . $title . '」' . PHP_EOL .
//                 '#photo #anime #photography #アニメ #聖地 #写真 #HolyPlacePhoto' . PHP_EOL .
//                 'https://www.holy-place-photo.com/photos/' . $id
//         ]);
//     }
// }

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
    // Bearer token: AAAAAAAAAAAAAAAA.....XYZ


    // 投稿
    public function tweet()
    {
        $twitter = new TwitterOAuth(
            self::TWITTER_API_KEY,
            self::TWITTER_API_SECRET_KEY,
            self::TWITTER_CLIENT_ID_ACCESS_TOKEN,
            self::TWITTER_CLIENT_ID_ACCESS_TOKEN_SECRET
        );


        $message = <<<EOT
テスト投稿
EOT;
        }


        $ret = $twitter->post("statuses/update", [
            "status" =>$message]);
        var_dump(json_decode(json_encode($ret,320), true, 320)['errors'][0]['message']);
    }
}
