/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
import java.io.BufferedReader;
import java.io.File;
import java.io.FileReader;
import java.io.FileWriter;
import java.io.IOException;
import java.util.Calendar;
/**
 *
 * @author guest1Day
 */

//Java の標準クラスについて，これまでに扱っていないものを自身で調査し，その標準クラスを利用した処理を記述してください。 
//その際，「ファイル操作編」の単元で学習した内容を利用して，以下の内容が記載されたログファイルを作成してください。 

//1. 処理の内容（例：文字列の置換） 
//2. 処理を開始する旨と，その時刻（例：2000-01-01 12:00 開始） 
//3. 処理を終了する旨と，その時刻（例：2000-04-04 11:00 終了） 
public class NewClass11 {
    public static void main(String[] args) {
        String word = "桜, 百合, 薔薇";

        // 文字の配列化 -- お菓子が配列化
        String[] flours = word.split(",", 0);
    }
    public static void FirstData(String[] args) {
        // カレンダーインスタンスの作成
        Calendar c = Calendar.getInstance();

        // 2018年5月25日 11時10分00秒
        c.set(2018, 5, 25, 11, 10, 00);
    }
    public static void LastData(String[] args) {
        // カレンダーインスタンスの作成
        Calendar a = Calendar.getInstance();

        // 2018年6月1日 10時30分30秒
        a.set(2018, 6, 1, 10, 30, 30);
    }
    public static void file(String[] args) throws IOException {
        // ファイルオープン
        File fp = new File("test1.txt");

        // FileWriter作成
        FileWriter fw = new FileWriter(fp);
        // 書き込み
        fw.write("小林英里香");
        // クローズ
        fw.close();
    }
    public static void endFile(String[] args) throws IOException{
    File fp = new File("test1.txt");

    // FileReader作成
    FileReader fr = new FileReader(fp);
    // BufferedReader作成
    BufferedReader br = new BufferedReader(fr);
    // 1行読み出し
    System.out.print(br.readLine());

    br.close();
  }
}
