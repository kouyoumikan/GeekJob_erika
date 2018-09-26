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

try{ // データベータの障害対策(エラートラップ)
  // 入力データを受け取り、変数にコピーする
  $staff_name = $_POST['name'];
  $staff_pass = $_POST['pass'];
// 入力データに安全対策を施す
  // $staff_name = htmlspecialchars($staff_name, ENT_QUOTES, 'UTF-8');
  // $staff_pass = htmlspecialchars($staff_pass, ENT_QUOTES, 'UTF-8');

  requie_once('../common/common.php'); // common安全対策関数

  $post = sanitize($_POST);
  $staff_name = $post['name'];
  $staff_pass = $post['pass'];
  // データベースに接続
  $dsn = 'mysql:dbname=shop; host=localhost; charset=utf8';
  $user = 'root';
  $password = '';
  $dbh = new PDO($dsn, $user, $password);
  $dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // データベースに接続するための秘密の5行
  // SQL文でレコードを追加する
  $spl = 'INSERT INTO mst_staff(name, password) VALUES(?, ?)': // SQLを変数にコピーする
  $stmt = $dbh -> prepare($sql); // 準備する命令
  // ？にセットしたいデータが入っている変数を順番に記入
  $data[] = $staff_name;
  $data[] = $staff_pass;
  $stmt -> execute($data); // SQLで指令を出すための命令

  $dbh = null; // データベースから切断する

  print $staff_name;
  print 'さんを追加しました。<br>';

}catch(Exception $e){ // データベースにエラーが発生したらこのプログラムが動く
  print 'ただいま障害により大変ご迷惑をおかけしております。<br>';
  exit();
}

?>
<a href="staff_list.php">戻る</a>

</body>
</html>
