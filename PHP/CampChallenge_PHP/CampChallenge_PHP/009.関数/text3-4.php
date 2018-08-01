<?php
        // 関数へ戻り値を追加し、　true(boolean)　を返却するように修正してください。
        // また、関数の呼び出し側で戻り値を評価し、
        // trueなら「この処理は正しく実行できました」、そうでないなら「正しく実行できませんでした」と表示

        function getNum($num){

            if(turu){
                echo "この処理は正しく実行できました";
            }else{
                echo "正しく実行できませんでした";
            }
            return $num;
        }
        echo getNum();

        ?>
