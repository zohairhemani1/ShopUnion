(function () {
    var $tweet = $('#footer .tweet'),
                    $tweetText = $tweet.find('.last-tweet-text'),
                    $tweetAuthor = $tweet.find('.last-tweet-author'),
                    $tweetCreatedAt = $tweet.find('.last-tweet-createdat');

    $.get('/Home/GetLastTweet', function (data) {
        $tweetText.text(data.Text);
        $tweetAuthor.text('by ' + data.UserName);
        $tweetCreatedAt.text('at ' + data.CreatedAt);
    });
})();