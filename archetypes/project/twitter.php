<?php

require 'TwistOAuth.phar';


$consumer_key="ugNDKaKDCDzBLwsYhyfPtPZWj";
$consumer_secret="WVKHegMKC7sXB5hdVVrUlYgieO2q7IsBAw7dIWOcf1fDwlBbtv";
$access_token="893506236896886784-C1eqVO9t44C2DFEuR00Yk5Ly93SVSAH";
$access_token_secret="88FXefqnFERU5TrgEz8h5T1bM5Aqi8ZbMMYxMjD8VOpty";

$connection = new TwistOAuth($consumer_key, $consumer_secret, $access_token, $access_token_secret);

$tweets_params = ['q' => 'Cryptopia,GOX OR クリプトピア,GOX' ,'count' => '20'];
$tweets = $connection->get('search/tweets', $tweets_params)->statuses;

foreach ($tweets as $value) {
    $text = htmlspecialchars($value->text, ENT_QUOTES, 'UTF-8', false);
    // 検索キーワードをマーキング
    $keywords = preg_split('/,|\sOR\s/', $tweets_params['q']); //配列化
    foreach ($keywords as $key) {
        $text = str_ireplace($key, '<span class="keyword">'.$key.'</span>', $text);
    }
    // ツイート表示のHTML生成
    disp_tweet($value, $text);

}

?>