<?php
        // 1. 二重のforeachを利用して、九九表を作成してください。
        // 2. continueを利用して、5の段だけ表示されない様にしてみましょう。

        for($i = 1; $i <= 9; $i++){
        //↓1～9までを掛けるための初期値と条件式、増減式を設定します。
          for($n = 1; $n <= 9; $n++) {
          //↓スペース、1～9の段の値×1～9＝積、スペースを出力させます。
          echo $i. '×'. $n. '＝'. $i * $n. '　';
         }
       //↓1段終わるごとに改行を出力します。
       echo '<br>';
       }

        ?>
