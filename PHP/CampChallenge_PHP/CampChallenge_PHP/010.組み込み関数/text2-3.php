<?php
        // 2016年11月4日 10時0分0秒のタイムスタンプを作成し、「年-月-日 時:分:秒」で表示

        $stamp = mktime(0, 0, 0, 11, 4, 2016);
        $hiduke = date('Y-m-d His', $stamp);
        // 2017-11-04 000000と表示されます。
        echo $hiduke;

        ?>
