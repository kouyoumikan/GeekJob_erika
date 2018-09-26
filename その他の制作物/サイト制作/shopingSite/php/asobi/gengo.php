<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
    <title>西暦から元号を知る</title>
</head>
<body>

  <?php

    requie_once('../common/common.php'); // commonの中にある関数を呼び出す

    $seireki = $_POST['seireki']; // 関数で西暦に応じた元号を返す

    $wareki = gengo($seireki); // その元号を表示
    print $wareki; // この先は関数なので、プログラムの終了
    print '<br>';

    // function gengo($seireki){
    //   if(1868 <= $seireki && $seireki <= 1911){
    //     $gengo = '明治';
    //   }
    //   if(1912 <= $seireki && $seireki <= 1925){
    //     $gengo = '大正';
    //   }
    //   if(1926 <= $seireki && $seireki <= 1988){
    //     $gengo = '昭和';
    //   }
    //   if(1989 <= $seireki && $seireki <= 2018){
    //     $gengo = '平成';
    //   }
    //   if(2019 <= $seireki){
    //     $gengo = '';
    //   }
    //   return($gengo);
    // }

   ?>

</body>
</html>
