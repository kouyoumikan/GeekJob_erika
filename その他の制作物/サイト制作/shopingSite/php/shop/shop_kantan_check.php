<?php

session_start();

session_regenerate_id(true);

if(isset($_SESSION['member_login']) == false){
  print 'ログインされていません。 <br>';
  print '<a href="shop_list.html"> 商品一覧へ戻る</a> <br>';
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

  requie_once('../common/common.php');

  $code = $_POST['$member_code'];

  $dsn = 'mysql:dbname=shop; host=localhost; charset=utf8';
  $user = 'root';
  $password = '';
  $dbh = new PDO($dsn, $user, $password);
  $dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = 'SELECT name, email, postal1, postal2, address, tel FROM dat_member WHERE code = ? ';
  $stmt = $dbh -> prepare($sql);
  $data[] = $code;
  $stmt -> execute($data);
  $rec = $stmt -> fetch(PDO::FETCH_ASSOC);

  $dbh = null;

  $name = $rec['name'];
  $email = $rec['email'];
  $postal1 = $rec['postal1'];
  $postal2 = $rec['postal2'];
  $address = $rec['address'];
  $tel = $rec['tel'];

    print 'お名前 <br>';
    print $name;
    print ' <br>';

    print 'メールアドレス <br>';
    print $email;
    print ' <br>';

    print '郵便番号 <br>';
    print $postal1;
    print ' - ';
    print $postal2;
    print ' <br>';

    print '住所 <br>';
    print $address;
    print ' <br>';

    print '電話番号 <br>';
    print $tel;
    print ' <br>';

    print ' <form method="post" action="shop_kantan_done.php">';
    print ' <input type="hidden" name="name" value=" ' .$name. ' ">';
    print ' <input type="hidden" name="name" value=" ' .$email. ' ">';
    print ' <input type="hidden" name="name" value=" ' .$postal1. ' ">';
    print ' <input type="hidden" name="name" value=" ' .$postal2. ' ">';
    print ' <input type="hidden" name="name" value=" ' .$address. ' ">';
    print ' <input type="hidden" name="name" value=" ' .$tel. ' ">';

    print ' <input type="button" onclick="history.back()" value="戻る"><br>';
    print ' <input type="submit" value="OK"><br>';
    print ' </form>';

   ?>

</body>
</html>
