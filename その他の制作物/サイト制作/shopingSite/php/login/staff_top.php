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
    <title>ログインページ</title>
</head>
<body>
    ショップ管理トップメニュー<br>
    <br>
    <a href="../staff/staff_list.php"> スタッフ管理</a><br>
    <br>
    <a href="../product/pro_list.php"> 商品管理</a><br>
    <br>
    <a href="../order/oder_download.php"> 注文ダウンロード</a><br>
    <br>
    <a href="../logout/staff_logout.php"> ログアウト</a><br>

</body>
</html>
