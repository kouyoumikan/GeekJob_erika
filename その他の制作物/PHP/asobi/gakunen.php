<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html lang="ja">
<head>
<meta charset="UTF-8">
    <title>学年と校舎案内</title>
</head>
<body>

  <?php

    $gakunen = $_POST['gakunen'];

    switch ($gakunen) {
      case '1':
        // code...
        $kousha = 'あなたの校舎は南校舎です。';
        $bukatsu = '部活動にはスポーツ系と文化系があります。';
        $mokuhyou = 'まずは学校に慣れましょう。';
        break;

      case '2':
        // code...
        $kousha = 'あなたの校舎時は西校舎です。';
        $bukatsu = '学園祭目指して全力で取り組みましょう。';
        $mokuhyou = '今しか出来ないことを見つけましょう。';
        break;

      case '3':
        // code...
        $kousha = 'あなたの校舎は東校舎です。';
        $bukatsu = '受験に就職に忙しくなります。　後輩へ譲っていきましょう。';
        $mokuhyou = '早く卒業しましょう。';
        break;

      default:
        // code...
        $kousha = 'あなたの校舎は三年生と同じです。';
        $bukatsu = '部活動はありません。';
        $mokuhyou = '早く卒業しましょう。';
        break;
    }

    print '校舎: ' .$kousha. ' <br>';
    print '部活: ' .$bukatsu. ' <br>';
    print '目標: ' .$mokuhyou. ' <br>';

   ?>

</body>
</html>
