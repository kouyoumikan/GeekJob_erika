<?php
        // 1. 値が"A"なら「英語」,値が"あ"なら「日本語」,それ以外は何も表示しない処理

          $TEXT = "A";

          switch($TEXT){
              case "A":
                  echo "英語";
                  break;

              case "あ":
                  echo "日本語";
                  break;

              default:
                  echo " ";
                  break;
          }
        ?>
