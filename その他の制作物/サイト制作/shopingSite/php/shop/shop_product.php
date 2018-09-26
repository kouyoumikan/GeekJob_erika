<?php

  session_start();

  session_regenerate_id(true);

  if(isset($_SESSION['member_login']) == faise){
    print 'ようこそ！　ゲスト様　';
    print '<a href="member_login.html">会員ログイン</a> <br>';
    print '<br>';
  }else{
    print 'ようこそ！';
    print $_SESSION['member_name'];
    print '様　';
    print '<a href="member_logout.html">ログアウト</a> <br>';
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

  $sql = 'SELECT name, price, gazou FROM mst_product WHERE code = ?';
  $stmt = $dbh -> prepare($sql);
  $data[] = $pro_code;
  $stmt -> execute($data);

  $rec = $stmt -> fetch(PDO::FETCH_ASSOC);
  $pro_name = $rec['name'];
  $pro_price = $rec['price'];
  $pro_gazou_name = $rec['gazou'];

  $dbh = null;

  if($pro_gazou_name == ''){
    $disp_gazou = '';
  }else{
    $disp_gazou = '<img scr="../product/gazou/ '.$pro_gazou_name.' ">';
  }
  print '<a href="shop_cartin.php ? product='.$pro_code.' ">カートに入れる</a> <br>' ;

}catch(Exception $e){
  print 'ただいま障害により大変ご迷惑をおかけしております。<br>';
  exit();
}

?>

商品情報参照<br>
<br>
商品コード<br>
<?php print $pro_code; ?>
<br>
商品名<br>
<?php print $pro_name; ?>
<br>
価格<br>
<?php print $pro_price; ?>
<br>
<?php print $pro_gazou; ?>
<br>
<br>
<form>
  <input type="button" onclick="history.back()" value="戻る">
</form>

</body>
</html>
