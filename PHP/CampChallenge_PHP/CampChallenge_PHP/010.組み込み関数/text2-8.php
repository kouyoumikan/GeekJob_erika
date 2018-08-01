<?php
        // ファイルに自己紹介を書き出し、保存

        $fp = fopen('text2-8.php', 'w');
        // きちんと開けたら
        if ($fp != false) {
        // ファイルに書き込み
        fwrite($fp, '小林英里香');
        // 書いたら、閉じる
        fclose($fp);

        ?>
