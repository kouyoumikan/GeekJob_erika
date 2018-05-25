/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
import java.util.Date;


/**
 *
 * @author guest1Day
 */

//「2016年1月1日 0時0分0秒」の情報を持つタイムスタンプ（ミリ秒）を生成し，画面に表示
public class NewClass2 {
   public static void main(String[] args) {
        // 当日の日時で日付情報を作成
        Date someDay = new Date("2016/01/01 00:00:00");
        
        // 日付表示 -- 英語表記の日時表示
        System.out.print(someDay);
        // タイムスタンプ表示
        System.out.print(someDay.getTime());
    }
    }
