<?php
        // 引数が２つの関数を作成してください。１つ目の引数に３人分のプロフィールを、２つ目の引数に検索文字を受け取ります。
        // 関数の中では、１つ目の引数で得た３人分のプロフィール（項目は戻り値2と同様）から、検索文字列を名前に含む（部分一致）プロフィールを探し、
        // 該当１件を返却する。 それ以降は課題「戻り値2」と同じ処理

        function profile(){
            $data1 = array();
            $data['ID'] = 7;
            $data['age'] = 22;
            $data['name'] = '山田太郎';
            $data['address'] = "東京都";

            $data2 = array();
            $data['ID'] = 5;
            $data['age'] = 61;
            $data['name'] = '高橋一郎';
            $data['address'] = '青森県';

            $data3 = array();
            $data['ID'] = 10;
            $data['age'] = 37;
            $data['name'] = '佐藤浩';
            $data['address'] = '京都市';



        }

        $myprof = profile();
        echo $myprof['age'];//ageの利用
        echo $myprof['name']; // nameを利用
        echo $myprof['address'];//addressの利用

        ?>
