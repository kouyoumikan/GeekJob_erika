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

try{
  // 選択されたスタッフコードを受け取る
  $staff_code = $_GET['staffcode'];

  $dsn = 'mysql:dbname=shop; host=localhost; charset=utf8';
  $user = 'root';
  $password = '';
  $dbh = new PDO($dsn, $user, $password);
  $dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // スタッフコードで絞り込む。
  $sql = 'SELECT name FROM mst_staff WHERE code = ?';
  $stmt = $dbh -> prepare($sql);
  $data[] = $staff_code;
  $stmt -> execute($data);

  $rec = $stmt -> fetch(PDO::FETCH_ASSOC);
  $staff_name = $rec['name']; // スタッフ名を変数にコピーする

  $dbh = null;

}catch(Exception $e){
  print 'ただいま障害により大変ご迷惑をおかけしております。<br>';
  exit();
}

?>

スタッフ修正<br>
<br>
スタッフコード<br>
<?php print $staff_code; ?>
<br>
<br>
<form method="post" action="staff_edit_check.php">
  <input type="hidden" name="name" value="<?php print $staff_code; ?>"> <!--　名前を既に入力済みにする -->
  スタッフ名<br>
  <input type="text" name="name" style="width:200px" value="<?php print $staff_name; ?>">

  パスワードを入力してください。<br>
  <input type="password" name="pass" style="width:100px">
  パスワードをもう一度入力してください。<br>
  <input type="password" name="pass2" style="width:100px">
  <br>
  <input type="button" onclick="history.back()" value="戻る">
  <input type="submit" value="OK">
</form>

</body>
</html>
