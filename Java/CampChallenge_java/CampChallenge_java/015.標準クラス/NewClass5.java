/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
import java.util.Calendar;
import java.text.SimpleDateFormat;
import java.util.Date;
/**
 *
 * @author guest1Day
 */

//2015年1月1日 0時0分0秒と2015年12月31日 23時59分59秒の差（ミリ秒）を表示
public class NewClass5 {
   public static void main(String[] args) {
        // カレンダーインスタンスの作成
        Calendar c = Calendar.getInstance();
        // 2017年8月12日 18時10分33秒
        c.set(2015, 1, 1, 00, 00, 00);
        
        // カレンダーインスタンスの作成
        Calendar a = Calendar.getInstance();
        // 2017年8月12日 18時10分33秒
        a.set(2015, 12, 31, 23, 59, 59);
        
        //比較する日付のセット
        Date t1 = c.getTime();
        Date t2 = a.getTime();
        
        //日付の差を求める
        long diff = t1.getTime() - t2.getTime();

        // タイムスタンプ表示
        System.out.print(diff);
    }
}
