/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
import java.io.*;
import java.io.IOException;
/**
 *
 * @author guest1Day
 */

//自己紹介の記述されたテキストファイルを作成してください。
//ファイルの作成は，File クラスなどを利用することによって行ってください。
public class NewClass9 {
    public static void main(String[] args) throws IOException {
        // ファイルオープン
        File fp = new File("test.txt");

        // FileWriter作成
        FileWriter fw = new FileWriter(fp);
        // 書き込み
        fw.write("私の名前は小林英里香です。");
        // クローズ
        fw.close();
    }
}
