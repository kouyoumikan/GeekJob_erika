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
  $pro_code = $_GET['procode'];

  $dsn = 'mysql:dbname=shop; host=localhost; charset=utf8';
  $user = 'root';
  $password = '';
  $dbh = new PDO($dsn, $user, $password);
  $dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = 'SELECT name, price,gazou FROM mst_product WHERE code = ?';
  $stmt = $dbh -> prepare($sql);
  $data[] = $pro_code;
  $stmt -> execute($data);

  $rec = $stmt -> fetch(PDO::FETCH_ASSOC);
  $pro_name = $rec['name'];
  $pro_gazou_name = $rec['gazou'];

  $dbh = null;

  if($pro_gazou_name == ''){
    $disp_gazou = '';
  }else{
    $disp_gazou = '<img scr="./gazou/ '.$pro_gazou_name.' ">';
  }

}catch(Exception $e){
  print 'ただいま障害により大変ご迷惑をおかけしております。<br>';
  exit();
}

?>

商品削除<br>
<br>
商品コード<br>
<?php print $pro_code; ?>
<br>
商品名<br>
<?php print $pro_name; ?>
<br>
<?php print $disp_gazou; ?>
<br>
この商品を削除してよろしいですか？<br>
<br>
<form method="post" action="pro_delete_done.php">
  <input type="hidden" name="name" value="<?php print $pro_code; ?>">
  <input type="hidden" name="gazou_name" value="<?php print $pro_gazou_name; ?>">

  <input type="button" onclick="history.back()" value="戻る">
  <input type="submit" value="OK">
</form>

</body>
</html>
