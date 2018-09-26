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

  $sql = 'SELECT code, name FROM mst_staff WHERE 1';
  $stmt = $dbh -> prepare($sql);
  $stmt -> execute(); // この命令が終わった時点で、全てのデータが入っている

  $dbh = null;

  print 'スタッフ一覧　<br><br>';
  print '<form method="post" action="staff_branch.php">';

  while(true){ // スタッフの名前を$stmtから1レコードずつ取り出して表示。もうデータがなければループ終了
    $rec = $stmt -> fetch(PDO::FETCH_ASSOC);　// $stmtから1レコードを取り出す

    if($rec == false){ // もうデータがなければループ終了
      break;
    }
    print '<input type="radio" name="staffcode" value=" '.$rec['code'].' ">';
    print $rec['name'];　//　名前の表示
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
<a href="../login/staff_top.php"> トップページへ</a><br>

</body>
</html>
