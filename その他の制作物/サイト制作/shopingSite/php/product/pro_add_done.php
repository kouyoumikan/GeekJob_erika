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
  $pro_name = $_POST['name'];
  $pro_price = $_POST['pass'];
  $pro_gazou = $_POST['gazou_name']; // 画像のファイル名

  // $pro_name = htmlspecialchars($pro_name, ENT_QUOTES, 'UTF-8');
  // $pro_price = htmlspecialchars($pro_price, ENT_QUOTES, 'UTF-8');

  requie_once('../common/common.php'); // common安全対策関数

  $post = sanitize($_POST);
  $pro_name = $post['name'];
  $pro_price = $post['price'];

  $dsn = 'mysql:dbname=shop; host=localhost; charset=utf8';
  $user = 'root';
  $password = '';
  $dbh = new PDO($dsn, $user, $password);
  $dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $spl = 'INSERT INTO mst_product(name, price, gazou) VALUES(?, ?, ?)';
  $stmt = $dbh -> prepare($sql);
  $data[] = $pro_name;
  $data[] = $pro_price;
  $data[] = $pro_gazou_name; //　画像のファイル名もデータベースに格納するようにする
  $stmt -> execute($data);

  $dbh = null;

  print $pro_name;
  print ' を追加しました。<br>';

}catch(Exception $e){
  print 'ただいま障害により大変ご迷惑をおかけしております。<br>';
  exit();
}

?>
<a href="pro_list.php">戻る</a>

</body>
</html>
