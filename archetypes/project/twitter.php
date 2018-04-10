<?php

require('/Users/user/python/Matome/archetypes/project/TwistOAuth/src/TwistOAuth.php');

$consumer_key = 'ugNDKaKDCDzBLwsYhyfPtPZWj';
$consumer_secret = 'WVKHegMKC7sXB5hdVVrUlYgieO2q7IsBAw7dIWOcf1fDwlBbtv';
$access_token = '893506236896886784-C1eqVO9t44C2DFEuR00Yk5Ly93SVSAH';
$access_token_secret = '88FXefqnFERU5TrgEz8h5T1bM5Aqi8ZbMMYxMjD8VOpty';



$connection = new TwistOAuth($consumer_key, $consumer_secret, $access_token, $access_token_secret);

$tweets_params = ['q' => 'カネボウ,就活' ,'count' => '100'];
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


function disp_tweet($value, $text){
    $icon_url = $value->user->profile_image_url;
    $screen_name = $value->user->screen_name;
    $updated = date('Y/m/d H:i', strtotime($value->created_at));
    $tweet_id = $value->id_str;
    $url = 'https://twitter.com/' . $screen_name . '/status/' . $tweet_id;

    echo '<div class="tweetbox">' . PHP_EOL;
    echo '<div class="thumb">' . '<img alt="" src="' . $icon_url . '">' . '</div>' . PHP_EOL;
    echo '<div class="meta"><a target="_blank" href="' . $url . '">' . $updated . '</a>' . '<br>@' . $screen_name .'</div>' . PHP_EOL;
    echo '<div class="tweet">' . $text . '</div>' . PHP_EOL;
    echo '</div>' . PHP_EOL;
}

?>