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
$staff_code = $_POST['code'];
$staff_name = $_POST['name'];
$staff_pass = $_POST['pass'];
$staff_pass2 = $_POST['pass2'];

// $staff_name = htmlspecialchars($staff_name, ENT_QUOTES, 'UTF-8');
// $staff_pass = htmlspecialchars($staff_pass, ENT_QUOTES, 'UTF-8');
// $staff_pass2 = htmlspecialchars($staff_pass2, ENT_QUOTES, 'UTF-8');

requie_once('../common/common.php'); // common安全対策関数

$post = sanitize($_POST);
$staff_name = $post['name'];
$staff_pass = $post['pass'];
$staff_pass2 = $post['pass2'];

if($staff_name = ''){
  print 'スタッフ名が入力されていません。';
}else{
  print 'スタッフ名: ';
  print $staff_name;
  print '<br>';
}

if($staff_pass = ''){
  print 'パスワードが入力されていません。';
}

if($staff_pass != $staff_pass２){
  print 'パスワードが一致しません。';
}

if($staff_name = '' || $staff_pass = '' || $staff_pass != $staff_pass2){
  print '<from>';
  print '<input type="button" onclick="history.back()" value="戻る">';
  print '</from>';
}else{
  $staff_pass = md5($staff_pass);
  print '<form method="post" action="staff_edit_done.php">';
  print '<input type ="hidden" name="code" value=" '.$staff_code.' ">';
  print '<input type ="hidden" name="name" value=" '.$staff_name.' ">';
  print '<input type ="hidden" name="pass" value=" '.$staff_pass.' ">';
  print '<br>';
  print '<input type="button" onclick="history.back()" value="戻る">';
  print '<input type="submit" value="OK">';
  print '</form>';
}

?>

</body>
</html>
