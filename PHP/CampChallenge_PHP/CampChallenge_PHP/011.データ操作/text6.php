<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <form enctype="multipart/form-data" action="sample.php" method="post">
            ファイル：<input name="userfile" type="file" />
            <input type="submit" value="送信">
        </form>

        <?php
        // ファイルアップロード機能を作成し、ファイルの中身を読み込んで表示する機能を追加してください。

        // アップロードされたファイルの情報は $_FILESに多次元配列として格納されています
        var_dump($_FILES['userfile']);

        // アップロードファイルの取得情報を確認

        // 正式ファイル名
        echo $_FILES['userfile']['name'];
        // 一時ファイル名
        echo $_FILES['userfile']['tmp_name'];
        // ファイルサイズ
        echo $_FILES['userfile']['size'];
        // エラー情報
        echo $_FILES['userfile']['error'];

        // 一時フォルダのファイルをWebアプリの管理下に移動
        // Webアプリのファイル管理は、filesフォルダで実施
        $files_path = './files/' . $_FILES['userfile']['name'];
        // ファイルを移動
        if (move_uploaded_file($_FILES['userfile']['tmp_name'],
            $files_path)) {
            // 成功したら、中身を表示してみる
            echo file_get_contents($files_path);
        }

        ?>
    </body>
</html>
