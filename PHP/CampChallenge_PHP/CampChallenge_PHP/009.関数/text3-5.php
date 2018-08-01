<?php
        // 1. 戻り値として、人物のID、名前、生年月日、住所を配列にして返却する関数を作成してください。
        // 2. 作成した関数を呼び出し、戻り値のID以外を表示

        function profile(){
            $data = array();
            $data['ID'] = 7;
            $data['age'] = 22;
            $data['name'] = "小林英里香";
            $data['address'] = "東京都";

            return $data;
        }

        $myprof = profile();
        echo $myprof['age'];//ageの利用
        echo $myprof['name']; // nameを利用
        echo $myprof['address'];//addressの利用

        ?>
