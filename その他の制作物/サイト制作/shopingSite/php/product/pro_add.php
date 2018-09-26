<?php

  session_start(); // 合言葉を確認する
  // セッションハイジャック対策
  session_regenerate_id(true); // パソコンとサーバー間で合言葉(セッションID)を変える

  if(isset($_SESSION['login']) == false){ // ログインOK　という証拠がなければログイン画面へ戻る
    print 'ログインされていません。 <br>';
    print '<a href="../staff_login/staff_login.html"> ログイン画面へ</a>';
    exit();
  }else{
    print $_SESSION['staff_name'] ;
    print 'さん、ログイン中 <br>';
    print '<br>';
  }

 ?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
    <title>ショッピングサイト ー サンプル ー </title>
</head>
<body>
  商品追加<br>
  <form method="post" action="pro_add_check.php" enctype="multipart/form-data">
    商品名を入力してください。<br>
    <input type="text" name="name" style="width:200px"><br>
    価格を入力してください。<br>
    <input type="text" name="price" style="width:50px"><br>
    <br>
    画像を選んでください。<br>
    <input type="file" name="gazou" style="width:400px"><br>
    <br>
    <input type="button" onclick="history.back()" value="戻る"><br>

    <input type="submit" value="OK"><br>
  </form>

</body>
</html>
