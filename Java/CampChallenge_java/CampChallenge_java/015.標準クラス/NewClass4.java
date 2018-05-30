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

//「2016年11月4日 10時0分0秒」の情報を持つタイムスタンプ（ミリ秒）を生成し，画面に表示してください。
//その後，さらにこの情報を「2016-11-04 10:00:00」の形式で画面に表示してください。
public class NewClass4 {
  public static void main(String[] args) {
        // カレンダーインスタンスの作成
        Calendar c = Calendar.getInstance();

        // 2016年11月4日 10時0分0秒
        c.set(2016, 11, 04, 10, 00, 00);
        
         // SimpleDateFormat作成
        SimpleDateFormat sdf =
            new SimpleDateFormat("yyyy-MM-dd HH:mm:ss");

        System.out.print(sdf.format(c.getTime()));
    }
}
