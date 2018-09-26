<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
    <title>ショッピングサイト ー サンプル ー </title>
</head>
<body>

  <?php

  try{
    $pro_code = $_GET['product'];

    $cart = $_SESSION['cart']; // 現在のカート内容を$cartにコピーする
    $cart[] = $pro_code; // カートに商品を追加する
    $_SESSION['cart'] = $cart; // $_SESSIONにカートを保管する

    if(isset($_SESSION['cart']) == true){ // もし$_SESSIONにカートが入っていれば
      $cart = $_SESSION['cart'];
      $kazu = $_SESSION['kazu']; // ここに来ることが２回目以降の場合のみに必ず存在する

      // もしカートに同じ商品のデータがあったら探す 
      if(in_array($pro_code, $cart) == true){ // (in_arrayは配列の中に同じデータがあるかどうかをチェックして探してくれる命令)
        print 'その商品はすでにカートに入っています。<br>';
        print '<br>';
        print '<a href="shop_list.php">商品一覧へ戻る</a>';
        exit();
      }
    }

    $cart[] = $pro_code; // カートに入れる
    $kazu[] = 1; // 商品の数量１
    $_SESSION['cart'] = $cart; // どの画面でもカートを見れるようにする
    $_SESSION['kazu'] = $kazu; // 後で取り出せるように保管

    // foreach ($cart as $key => $value) { // カートの中身を全部表示 (動作用テスト)
    //   // code...
    //   print $value;
    //   print '<br>';
    }

  }catch(Exception $e){
    print 'ただいま障害により大変ご迷惑をおかけしております。<br>';
    exit();
  }

   ?>

   カートに追加しました。<br>
   <br>
   <a href="shop_list.php">商品一覧に戻る</a>

</body>
</html>
