<?php
  header('Content-Type: text/html; charset=UTF-8');
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>HTML入門-フォームの作成</title>
</head>
<body>
    <table border="1">
      <tr>
        <td>名前</td><td><?php echo $_POST["name"] ?></td>
      </tr>
      <tr>
        <td>メールアドレス</td><td><?php echo $_POST["mail"] ?></td>
      </tr>
      <tr>
        <td>お問合せ内容</td><td><?php echo $_POST["comment"] ?></td>
      </tr>
    </table>
</body>
</html>
