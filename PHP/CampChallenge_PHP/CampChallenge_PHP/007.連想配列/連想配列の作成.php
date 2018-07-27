<?php
        // 以下の順で、連想配列を作成してください。
       // "1"に"AAA", "hello"に"world", "soeda"に"33", "20"に"20"

        $user = array(
              "1" => "AAA",
              "hello" => "world",
              "soeda" => "33",
              "20" => "20"
          );

          echo $user["1"];
          echo $user["hello"];
          echo $user["soeda"];
          echo $user["20"];

          $user["20"] = "age"; //キーワードの20の中身 20→age　変更

          echo $user["20"];
        ?>
