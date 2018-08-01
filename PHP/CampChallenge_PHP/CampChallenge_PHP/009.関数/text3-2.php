<?php
        // 1. 引数として数値を受け取り、その値が奇数か偶数か判別＆表示する関数を作成してください。
        // 2. 作成した関数を利用して、適当な数値の奇数・偶数の判別を行ってください。

        $sum = getSum(5);
        function getSum($num){
            if($num % 2 == 0){
                echo "偶数";
            }else if($num % 3 == 0){
                echo "奇数";
            }
            echo $sum;
        }

        ?>
