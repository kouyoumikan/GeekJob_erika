<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // クッキーに現在時刻を記録し、次にアクセスした際に、前回記録した日時を表示

        // ユーザーのアクセス日時を保存する処理
        // ユーザーの１回目の訪問
        $access_time = date('Y年m月d日');
        setcookie('LastLoginDate', $access_time);
        echo $access_time;

        // ユーザーのアクセス日時を表示する処理
        echo '前回のアクセス日時：' . $_COOKIE['LastLoginDate'];

        ?>
    </body>
</html>
