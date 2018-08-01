<?php
        // ファイルから自己紹介を読み出し、表示

        $fp = fopen('text2-9.php', 'r');
        // きちんと開けたら
        if ($fp != false) {
        // １行読み出し
        echo fgets($fp, '小林英里香');
        // 書いたら、閉じる
        fclose($fp);
        }

        ?>
