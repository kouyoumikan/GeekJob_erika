<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
    <title>ショッピングサイト ー サンプル ー </title>
</head>
<body>

  <?php

  requie_once('../common/common.php');

  $post = sanitize($_POST); // 安全対策

  $name = $post['name'];
  $email = $post['email'];
  $postal1 = $post['postal1'];
  $postal2 = $post['postal2'];
  $address = $post['address'];
  $tel = $post['tel'];

  $chumon = $post['chumon'];
  $pass = $post['pass'];
  $pass2 = $post['pass2'];
  $danjo = $post['danjo'];
  $birth = $post['birth'];

  $okflg = true; // 一つでも入力ミスがあった場合に、戻るボタンを出すようにする (フラグ制御)

  if($name == ''){
    print 'お名前が入力されていません。 <br>';
    $okflg = false;
  }else{
    print 'お名前 <br>';
    print $name;
    print '<br>';
  }

  if(preg_match('/￥A[￥w￥￥.] + ￥@[￥w￥￥.] + ￥.([a - z] + )￥z/', $email) == 0){
    print 'メールアドレスが入力されていません。 <br>';
    $okflg = false;
  }else{
    print 'メールアドレス <br>';
    print $email;
    print '<br>';
  }

  if(preg_match('/￥A[0-9] + ￥z/', $postal1) == 0){
    print '郵便番号は半角数字で入力してください。 <br>';
    $okflg = false;
  }else{
    print '郵便番号 <br>';
    print $postal1;
    print ' - ';
    print $postal2;
    print '<br>';
  }

  if(preg_match('/￥A[0-9] + ￥z/', $postal2) == 0){
    print '郵便番号は半角数字で入力してください。 <br>';
    $okflg = false;
  }

  if($address == ''){
    print '住所が入力されていません。 <br>';
    $okflg = false;
  }else{
    print '住所 <br>';
    print $address;
    print '<br>';
  }

  if(preg_match('/￥A{2,5} - ￥d{2,5} - ￥d{4,5}￥z/', $tel) == 0){
    print '電話番号は正確に入力してください。 <br>';
    $okflg = false;
  }else{
    print '電話番号 <br>';
    print $tel;
    print '<br>';
  }

  if($chumon == 'chumontouroku'){
    if($pass == ''){
      print 'パスワードが入力されていません。 <br>';
      $okflg = false;
    }
    if($pass != $pass2){
      print 'パスワードが一致しません。 <br>';
      $okflg = false;
    }

    print '性別 <br>';

    if($danjo == 'dan'){
      print '男性 <br>';
    }else{
      print '女性 <br>';
    }
    print ' <br>';

    print '生まれ年 <br>';
    print $birth;
    print '年代 <br>';
    print ' <br>';

  }

  if($okflg == true){
    print ' <form method="post" action="shop_form_done.php">';
    print ' <input type="hidden" name="name" value=" ' .$name. ' ">';
    print ' <input type="hidden" name="name" value=" ' .$email. ' ">';
    print ' <input type="hidden" name="name" value=" ' .$postal1. ' ">';
    print ' <input type="hidden" name="name" value=" ' .$postal2. ' ">';
    print ' <input type="hidden" name="name" value=" ' .$address. ' ">';
    print ' <input type="hidden" name="name" value=" ' .$tel. ' ">';

    print ' <input type="hidden" name="name" value=" ' .$chumon. ' ">';
    print ' <input type="hidden" name="name" value=" ' .$pass. ' ">';
    print ' <input type="hidden" name="name" value=" ' .$danjo. ' ">';
    print ' <input type="hidden" name="name" value=" ' .$birth. ' ">';

    print ' <input type="button" onclick="history.back()" value="戻る"><br>';
    print ' <input type="submit" value="OK"><br>';
    print ' </form>';

  }else{
    print ' <form>';
    print ' 入力内容に誤りがあります。<br>';
    print ' <br>';
    print ' <input type="button" onclick="history.back()" value="戻る"><br>';
    print ' </form>';
  }

   ?>

</body>
</html>
