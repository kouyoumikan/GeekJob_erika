<?php

  session_start();

  session_regenerate_id(true);

  if(isset($_SESSION['member_login']) == false){
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

  $cart = $_SESSION['cart']; // 保管していたカートの中身を戻す
  // var_dump($cart);　保管していたカートの中身を仮に表示 (動作テストやデバックによく使う命令)
  // exit();
  $kazu = $_SESSION['kazu'];
  $max = count($cart); // 事前に配列内のデータ数を知りたいときに使う命令

  if(isset($_SESSION['cart']) == true){ // もしカートが最初から空だったら、強制的に０を入れる
    $cart = $_SESSION['cart'];
    $kazu = $_SESSION['kazu'];
    $max = count($cart);
  }else{
    $max = 0;
  }

  if($max == 0){
    print 'カートに商品が入っていません。<br>';
    print '<br>';
    print '<a href="shop_list.php">商品一覧へ戻る</a>';
    exit();
  }

  $dsn = 'mysql:dbname=shop; host=localhost; charset=utf8';
  $user = 'root';
  $password = '';
  $dbh = new PDO($dsn, $user, $password);
  $dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  foreach ($cart as $key => $value) {
    // code...
    $sql = 'SELECT code, name, price,gazou FROM mst_product WHERE code =? ';
    $stmt = $dbh -> prepare($sql);
    $data[0] = $value;
    $stmt -> execute();

    $rec = $stmt -> fetch(PDO::FETCH_ASSOC);

    $pro_name[] = $rec['name'];
    $pro_price[] = $rec['price'];

    if($rec['gazou'] == ''){
      $pro_gazou[] = '';

    }else{
      $pro_gazou[] = '<img src = "../product/gazou/ '.$rec['gazou'].' ">'
    }
  }

  $dbh = null;

  // for ($i=0; $i < $max; $i++) {
  //   // code...
  //   print $pro_name[$i];
  //   print $pro_gazou[$i];
  //   print $pro_price[$i] .'円';
  //   print '<br>';
  // }

  print '商品一覧　<br><br>';

  while(true){
    $rec = $stmt -> fetch(PDO::FETCH_ASSOC);

    if($rec == false){
      break;
    }
    print '<a href="shop_product.php ? product='.$rec['code'].' ">';
    print $rec['name'].'---';
    print $rec['price'].'円';
    print '</a>';
    print '<br>';
  }

}catch(Exception $e){
  print 'ただいま障害により大変ご迷惑をおかけしております。<br>';
  exit();
}

?>

カートの中身<br>
<br>
<form method="post" action="kazu_change.php">
<table border="1">
  <tr>
    <td>商品</td>
    <td>商品画像</td>
    <td>価格</td>
    <td>数量</td>
    <td>小計</td>
    <td>削除</td>
  </tr>

<?php
  for ($i=0; $i < $max; $i++) { ?>
  <tr>
    <td> <?php print $pro_name[$i]; ?> </td>
    <td> <?phpprint $pro_gazou[$i]; ?> </td>
    <td> <?phpprint $pro_price[$i] .'円'; ?> </td>
    <td> <?phpprint $kazu[$i]; ?> </td>
    <td> <?php print '<br>'; ?> </td>

    <td> <input type="text" name="kazu <?php print $i; ?>" value="<?php print $kazu[$i]; ?>"> </td>
    <td> <?php print $pro_price[$i] * $kazu[$i]; ?> 円 </td>
    <td> <input type="checkbox" name="sakujo <?php print $i; ?> "> </td>
    <br>
  </tr>
<?php
 } ?>
</table>

  <input type="hidden" name="max" value=" <?php print $max; ?> ">
  <input type="submit" value="数量変更">
  <input type="button" onclick="history.back()" value="戻る">
</form>

<br>
<a href="shop_form.html">ご購入手続きへ進む。</a> <br>;
<br>

<?php

  if(isset($_SESSION['member_login']) == true){
    print ' <a href="shop_kantan_check.php"> 会員かんたん注文へ進む。</a> <br>; '
  }

 ?>

<a href="shop_cartlook.php">カートを見る</a> <br>;
<br>
<a href="../staff_login/staff_top.php">トップページへ</a> <br>;

</body>
</html>
