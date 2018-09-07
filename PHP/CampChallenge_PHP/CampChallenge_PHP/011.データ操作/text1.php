<html>
    <head>
        <meta charset="UTF-8">
        <title>text1.php</title>
    </head>
    <body>

        <!-- <table border="1">
        <tr>
          <td>名前</td><td><?php echo $_POST["name"] ?></td>
        </tr>
        <tr>
          <td>性別</td><td><?php echo $_POST["seibetu"] ?></td>
        </tr>
        <tr>
          <td>趣味</td><td><?php echo $_POST["shumi"] ?></td>
        </tr>
      </table> -->

        <?php
         // HTMLには入力フィールド意外にも様々なタグが存在します。
        // Webページをデザインする上で欠かせない知識なので、タグを調べ、色々と使ってみましょう。

        date.timezone = "Asia/Tokyo"
        // テキストボックスの情報
        $name = $_POST['name'];
        echo htmlspecialchars($name);

        print ("次のデータを受け取りました<br />");
        print ("名前：$name<br />");
        // チェックボックスの情報
        // echo $_POST['chkTest'];
        // ラジオボタンの情報
        $seibetu = $_POST['seibetu'];
        echo htmlspecialchars($seibetu);
        print ("名前：$seibetu<br />");

        // コンボボックス（select）の情報
        // echo $_POST['cmbList'];
        // テキストエリアの情報
        $shumi = $_POST['shumi'];
        echo htmlspecialchars($shumi);
        print ("名前：$shumi<br />");
        ?>
    </body>
</html>
