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

$pro_name = $_POST['name'];
$pro_price = $_POST['price'];
$pro_gazou = $_POST['gazou']; // 受け取った画像ファイルの情報を取り出す

// $pro_name = htmlspecialchars($pro_name, ENT_QUOTES, 'UTF-8');
// $pro_price = htmlspecialchars($pro_price, ENT_QUOTES, 'UTF-8');

requie_once('../common/common.php'); // common安全対策関数

$post = sanitize($_POST);
$pro_name = $post['name'];
$pro_price = $post['price'];

if($pro_name = ''){
  print '商品名が入力されていません。';
}else{
  print '商品名: ';
  print $pro_name;
  print '<br>';
}

if(preg_match('/￥A[0-9] + ￥z', $pro_price) == 0){ // もし半角数字ではなかったら　というチェックをする
  print '価格をきちんと入力してください。';
}else{
  print '価格: ';
  print $pro_price;
  print '円<br>';
}

if($pro_gazou['size'] > 0){ // もし画像サイズが０より大きければ　画像あり

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
}else{
  print '上記の商品を追加します。'
  print '<form method="post" action="pro_add_done.php">';
  print '<input type ="hidden" name="name" value=" '.$pro_name. ' ">';
  print '<input type ="hidden" name="price" value=" '.$pro_price.' ">';
  print '<input type ="hidden" name="gazou" value=" '.$pro_gazou['name'].' ">'; // 画像名を次の画面に渡す
  print '<br>';
  print '<input type="button" onclick="history.back()" value="戻る">';
  print '<input type="submit" value="OK">';
  print '</form>';
}

?>

</body>
</html>
