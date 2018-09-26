<?php // 商品の数量を変更する

session_start();

session_regenerate_id(true);

requie_once('../common/common.php');

$post = sanitize($_POST);

$max = $post['max'];

for ($i=0; $i < $max; $i++) {
  // code...
  if(preg_match("/￥A[0-9] + ￥z", $post['kazu', $i]) == 0){ // 半角数字以外が入力されたら、カートに戻る
    print '数量に誤りがあります。<br>';
    print '<br>';
    print '<a href="shop_cartlook.php">カートに戻る</a>';
    exit();
  }
  if($post['kazu', $i] < 1 || 10 < $post['kazu', $i]){ // 商品の数量の範囲の対策(ありえない数を入力できないように)
    print '数量は必ず１個以上、１０個までです。<br>';
    print '<br>';
    print '<a href="shop_cartlook.php">カートに戻る</a>';
    exit();
  }

  $kazu[] = $post['kazu' .$i];
}

$cart = $_SESSION['cart'];

for ($i=$max; 0 < $i; $i++) { // 商品の削除機能の追加
  // code...
  if(isset($_POST['sakujo' .$i]) == true){
    array_splice($cart, $i,1); // 配列を削除する命令array_spliceで、指定した要素を削除しそれ以降を前へ詰める
    array_splice($kazu, $i,1); // 商品の数量も削除する
  }
}

$_SESSION['cart'] = $cart;
$_SESSION['kazu'] = $kazu;

header('Location: shop_cartlook.php');
exit();

 ?>
