<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // 課題「クッキーの記録と表示」と同じ機能をセッションで作成

        //session_start() より前に記述
        // セッションファイルの有効期限を設定
        // 初期値では、最終アクセスから数えて24分後に削除
        ini_set('session.gc_maxlifetime', 60 * 60 * 24);

        $date = date("Y/m/d H:i:s");
        setcookie('LastLoginDate', $date);
        $lastdate = $date;
        echo $date;

        // セッション開始
        session_start();

        // セッションに情報を入れる。
        $_SESSION['time'] = $date;
        $_SESSION['lasttime'] = $lastdate;

        // セッションからデータを取り出す
        echo '前回のアクセス日時：' . $_SESSION['lasttime'];

        ?>
    </body>
</html>
