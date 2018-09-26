<?php

  session_start(); // 合言葉を確認する
  // セッションハイジャック対策
  session_regenerate_id(true); // パソコンとサーバー間で合言葉(セッションID)を変える

  if(isset($_SESSION['login']) == false){ // ログインOK　という証拠がなければログイン画面へ戻る
    print 'ログインされていません。 <br>';
    print '<a href="../staff_login/staff_login.html"> ログイン画面へ</a>';
    exit();
  }

if(isset($_POST['disp']) == true){

  if(isset($_POST['staffcode']) == false){
    header('Location: staff_ng.php');
    exit();
  }
  $staff_code = $_POST['staffcode'];
  header('Location: staff_disp.php ?staffcode = ' .$staff_code);
  exit();
}

  if(isset($_POST['add']) == true){
    header('Location: staff_add.php');
    exit();
  }

  if(isset($_POST['edit']) == true){

    if(isset($_POST['staffcode']) == false){
      header('Location: staff_ng.php');
      exit();
    }

    // print '修正ボタンが押された。'
    $staff_code = $_POST['staffcode'];
    header('Location: staff_edit.php ?staffcode = ' .$staff_code);
    exit();
  }

  if(isset($_POST['delete']) == true){

    if(isset($_POST['staffcode']) == false){
      header('Location: staff_ng.php');
      exit();
    }

    // print '削除ボタンが押された。';
    $staff_code = $_POST['staffcode'];
    header('Location: staff_delete.php ?staffcode = ' .$staff_code);
    exit();
  }

 ?>
