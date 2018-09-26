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
  $dsn = 'mysql:dbname=shop; host=localhost; charset=utf8';
  $user = 'root';
  $password = '';
  $dbh = new PDO($dsn, $user, $password);
  $dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = 'SELECT code, name, price FROM mst_product WHERE 1';
  $stmt = $dbh -> prepare($sql);
  $stmt -> execute();

  $dbh = null;

  print '商品一覧　<br><br>';
  print '<form method="post" action="pro_branch.php">';

  while(true){
    $rec = $stmt -> fetch(PDO::FETCH_ASSOC);

    if($rec == false){
      break;
    }
    print '<input type="radio" name="procode" value=" '.$rec['code'].' ">';
    print $rec['name'].'---';
    print $rec['price'].'円';
    print '<br>';
  }
  print '<input type="submit" name = "disp" value="参照">'<br>;
  print '<input type="submit" name = "add" value="追加">'<br>;
  print '<input type="submit" name = "edit" value="修正">'<br>;
  print '<input type="submit" name = "delete" value="削除">'<br>;
  print '</form>';

}catch(Exception $e){
  print 'ただいま障害により大変ご迷惑をおかけしております。<br>';
  exit();
}

?>

<br>
<a href="../staff_login/staff_top.php">トップページへ</a> <br>;

</body>
</html>
