<?php

session_start();

session_regenerate_id(true);

if(isset($_SESSION['member_login']) == false){
  print 'ログインされていません。 <br>';
  print '<a href="shop_list.html">商品一覧へ戻る </a> <br>';
  exit();
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

  requie_once('../common/common.php');

  $post = sanitize($_POST);
  $name = $post['name'];
  $name = $post['email'];
  $name = $post['postal1'];
  $name = $post['postal2'];
  $name = $post['address'];
  $name = $post['tel'];

  $chumon = $post['chumon'];
  $pass = $post['pass'];
  $danjo = $post['danjo'];
  $birth = $post['birth'];

  print $name .'様 <br>';
  print 'ご注文ありがとうございました。 <br>';
  print $email .'にメールを送りましたのでご確認ください。 <br>';
  print '商品は以下の住所に発送させていただきます。 <br>';
  print $postal1 .' - ' .$postal2 .'<br>';
  print $address .'<br>';
  print $tel .'<br>';
  print 'またのご利用をお待ちしております。 <br>';

  $honbun = '';
  $honbun. = $name. "様 ￥n￥n この度はご注文いただきありがとうございました。 ￥n";
  $honbun. = "￥n";
  $honbun. = "ご注文商品 ￥n";
  $honbun. = "---------------- ￥n";

  $cart = $_SESSION['cart'];
  $kazu = $_SESSION['kazu'];
  $max = count($cart);

  $dsn = 'mysql:dbname=shop; host=localhost; charset=utf8';
  $user = 'root';
  $password = '';
  $dbh = new PDO($dsn, $user, $password);
  $dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  for ($i=0; $i < $max; $i++) {
    // code...
    $sql = 'SELECT code, name, price,gazou FROM mst_product WHERE code =? ';
    $stmt = $dbh -> prepare($sql);
    $data[0] = $value;
    $stmt -> execute();

    $rec = $stmt -> fetch(PDO::FETCH_ASSOC);

    $name = $rec['name'];
    $price = $rec['price'];
    $kakaku[] = $price;
    $suryo = $kazu['$i'];
    $shokei = $price * $suryo;

    $honbun = $name .'';
    $honbun = $price .'円 ×';
    $honbun = $suryo .'個 ＝';
    $honbun = $shokei .'円 ￥n';

    }

    $sql = 'LOCK TABLES dat_sales WRITE, dat_sales_product WRITE';
    $stmt = $dbh -> prepare($sql);
    $stmt -> execute();

    $lastmembercode = $_SESSION['$member_code'];

    if($chumon == 'chumontouroku'){
      $sql = 'INSERT INTO dat_member(password, name, email, postal1, postal2, address, tel, danjo, born)
      VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';
      $stmt = $dbh -> prepare($sql);
      $data = array();
      $data[] = md5($pass);
      $data[] = $name;
      $data[] = $email;
      $data[] = $postal1;
      $data[] = $postal2;
      $data[] = $address;
      $data[] = $tel;

      if($daujo == 'dan'){
        $data[] = 1;
      }else{
        $data[] = 2;
      }

      $data[] = $birth;
      $stmt = $dbh -> prepare($sql);

      $sql = 'SELECT LAST_INSERT_ID()';
      $stmt = $dbh -> prepare($sql);
      $stmt -> execute();
      $rec = $stmt -> fetch(PDO::FETCH_ASSOC);
      $lastcode = $rec['LAST_INSERT_ID()'];
    }

    $sql = 'INSERT INTO dat_sales(code_member, name, email, postal1, postal2, address, tel) VALUES (?, ?, ?, ?, ?, ?, ?)';
    $stmt = $dbh -> prepare($sql);
    $data = array();
    $data[] = $lastmembercode;
    $data[] = 0;
    $data[] = $name;
    $data[] = $email;
    $data[] = $postal1;
    $data[] = $postal2;
    $data[] = $address;
    $data[] = $tel;

    $stmt -> execute($data);

    $sql = 'SELECT LAST_INSERT_ID()';
    $stmt = $dbh -> prepare($sql);
    $stmt -> execute();
    $rec = $stmt -> fetch(PDO::FETCH_ASSOC);
    $lastcode = $rec['LAST_INSERT_ID()'];

    for ($i=0; $i < $max; $i++) {
      // code...
      $sql = 'INSERT INTO dat_sales_product(code_salse, code_product, price, quantity) VALUES (?, ?, ?, ?)';
      $stmt = $dbh -> prepare($sql);
      $data = array();
      $data[] = $lastcode;
      $data[] = $cart[$i];
      $data[] = $kakaku[$i];
      $data[] = $kazu[$i];
      $stmt -> execute($data);
    }

    $sql = 'UNLOCK TABLES';
    $stmt = $dbh -> prepare($sql);
    $stmt -> execute($data);

    $dbh = null;

    if($chumon == 'chumontouroku'){
      print '会員登録が完了いたしました。。 <br>';
      print '次回からメールアドレスとパスワードでログインしてください。 <br>';
      print 'ご注文が簡単にできるようになります。 <br>';
      print ' <br>';
    }

    $honbun = '送料は無料です。 ￥n';
    $honbun = '--------------- ￥n';
    $honbun = '￥n';
    $honbun = '代金は以下の口座にお振込みください。';
    $honbun = '￥￥￥銀行　￥￥￥支店　普通口座　1234567 ￥n';
    $honbun = '入金確認が取れ次第、梱包、発送させていただきます。 ￥n';
    $honbun = '￥n';

    if($chumon == 'chumontouroku'){
      print '会員登録が完了いたしました。 <br>';
      print '次回からメールアドレスとパスワードでログインしてください。 <br>';
      print 'ご注文が簡単にできるようになります。 <br>';
      print ' <br>';
    }

    $honbun = '◇◇◇◇◇◇◇◇◇◇◇◇◇◇◇◇';
    $honbun = ' ～ 安心野菜のえりか農園 ～ ';
    $honbun = '￥n';
    $honbun = '愛媛県松山市　123-5 ￥n';
    $honbun = '￥n';
    $honbun = 'address: 0120-1234-5678 ￥n';
    $honbun = 'email: test@gmai,ne.jp';
    $honbun = '◇◇◇◇◇◇◇◇◇◇◇◇◇◇◇◇';

    // print '<br>';
    // print nl2br($honbun);

    $title = 'ご注文ありがとうございます。';
    $header = 'Form: kouyoumikan136@gmail.com';
    $honbun = html_entity_decode($honbun, ENT_QUOTES, 'UTF-8');
    mb_language('Japanese');
    mb_internal_encoding('UTF-8');
    mb_send_mail($email, $title, $honbun, $header);

    $title = 'お客様からご注文がありました。';
    $header = 'Form: ' .$email;
    $header = 'Form: ' .$email;
    $honbun = html_entity_decode($honbun, ENT_QUOTES, 'UTF-8');
    mb_language('Japanese');
    mb_internal_encoding('UTF-8');
    mb_send_mail('kouyoumikan136@gmail.com', $title, $honbun, $header);

  }catch(Exception $e){
    print 'ただいま障害により大変ご迷惑をおかけしております。<br>';
    exit();
  }

  ?>

  <br>
  <a href="shop_list.php">商品画面へ</a>

</body>
</html>
