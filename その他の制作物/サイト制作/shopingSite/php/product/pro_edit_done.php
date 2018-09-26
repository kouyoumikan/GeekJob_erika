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
  $pro_code = $_POST['code'];
  $pro_name = $_POST['name'];
  $pro_price = $_POST['price'];

  $pro_gazou_name_old = $_POST['gazou_name_old'];
  $pro_gazou_name = $_POST['gazou_name'];

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

  $spl = 'UPDATA mst_product SET name = ?, price = ?, gazou = ? WHERE code = ?';
  $stmt = $dbh -> prepare($sql);
  $data[] = $pro_name;
  $data[] = $pro_price;
  $data[] = $pro_gazou_name;
  $data[] = $pro_code;
  $stmt -> execute($data);

  $dbh = null;

  if($pro_gazou_name_old != $pro_gazou_name){

    if($pro_gazou_name_old != ''){ // もし古い画像があれば削除する
      unlink('./gazou/' .$pro_gazou_name_old);
    }
  }
  print '修正しました。<br>';

}catch(Exception $e){
  print 'ただいま障害により大変ご迷惑をおかけしております。<br>';
  exit();
}

?>

修正しました。<br>
<br>
<a href="pro_list.php">戻る</a>

</body>
</html>
