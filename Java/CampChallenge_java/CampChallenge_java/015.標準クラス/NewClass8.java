/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author guest1Day
 */

//文字列型の変数を宣言して，"きょUはぴIえIちぴIのくみこみかんすUのがくしゅUをしてIます" をその値としてください。 
//宣言した変数について，「I」を「い」に，「U」を「う」に置換した文字列を表示してください。

public class NewClass8 {
     public static void main(String[] args, String[] arg) {
        String word = "きょUはぴIえIちぴIのくみこみかんすUのがくしゅUをしてIます";

        // 文字位置の取得 -- "I"が見つかるのは3番目
        System.out.print(word.indexOf("ぴIえIちぴIの") + ("きょUは"));
        

        // 文字の置換 -- "I"を"い"に
        System.out.print(word.replace("I", "い"));
        
        // 文字の置換 -- "I"を"い"に
        System.out.print(word.replace("U", "う"));
        
    }
}
