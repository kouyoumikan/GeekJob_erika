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
  $staff_code = $_POST['code'];
  $staff_name = $_POST['name'];
  $staff_pass = $_POST['pass'];

  // $staff_name = htmlspecialchars($staff_name, ENT_QUOTES, 'UTF-8');
  // $staff_pass = htmlspecialchars($staff_pass, ENT_QUOTES, 'UTF-8');

  requie_once('../common/common.php'); // common安全対策関数

  $post = sanitize($_POST);
  $staff_name = $post['name'];
  $staff_pass = $post['pass'];

  $dsn = 'mysql:dbname=shop; host=localhost; charset=utf8';
  $user = 'root';
  $password = '';
  $dbh = new PDO($dsn, $user, $password);
  $dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $spl = 'UPDATA mst_staff SET name = ?, password = ? WHERE code = ?';
  $stmt = $dbh -> prepare($sql);
  $data[] = $staff_name;
  $data[] = $staff_pass;
  $data[] = $staff_code;
  $stmt -> execute($data);

  $dbh = null;

}catch(Exception $e){
  print 'ただいま障害により大変ご迷惑をおかけしております。<br>';
  exit();
}

?>
修正しました。<br>
<br>
<a href="staff_list.php">戻る</a>

</body>
</html>
