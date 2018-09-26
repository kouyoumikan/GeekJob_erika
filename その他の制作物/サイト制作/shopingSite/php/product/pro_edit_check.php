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

<?php
$pro_code = $_POST['code'];
$pro_name = $_POST['name'];
$pro_price = $_POST['price'];

$pro_gazou_name_old = $_POST['gazou_name_old'];
$pro_gazou = $_FILES['gazou'];

// $pro_code = htmlspecialchars($pro_code, ENT_QUOTES, 'UTF-8');
// $pro_name = htmlspecialchars($pro_name, ENT_QUOTES, 'UTF-8');
// $pro_price = htmlspecialchars($pro_price, ENT_QUOTES, 'UTF-8');

requie_once('../common/common.php'); // common安全対策関数

$post = sanitize($_POST);
$pro_code = $post['code'];
$pro_name = $post['name'];
$pro_price = $post['price'];

if($pro_name = ''){
  print '商品名が入力されていません。';
}else{
  print '商品名: ';
  print $pro_name;
  print '<br>';
}

if($pro_price = ''){
  print '価格が入力されていません。';
}

if($pro_gazou['size'] > 0){

  if($pro_gazou['size'] > 1000000){
    print '画像が大きすぎます。';
  }else{
    move_uploaded_file($pro_gazou['tmp_name'], './gazou/' .$pro_gazou['name']);
    print '<img src="./gazou/' .$pro_gazou['name'].'">';
    print '<br>';
  }
}

if($pro_name = '' || preg_match('/￥A[0-9] + ￥z', $pro_price) == 0 || $pro_gazou['size'] > 1000000){
  print '<form>';
  print '<input type="button" onclick="history.back()" value="戻る">';
  print '</form>';
}

print '上記のように変更しました。'<br>;
print '<form method="post" action="pro_edit_done.php">';
print '<input type ="hidden" name="code" value=" '.$pro_code.' ">';
print '<input type ="hidden" name="name" value=" '.$pro_name.' ">';
print '<input type ="hidden" name="gazou_name" value=" '.$pro_gazou_name_old.' ">';
print '<input type ="hidden" name="gazou_name" value=" '.$pro_gazou['name'].' ">';
print '</form>';

?>

</body>
</html>
