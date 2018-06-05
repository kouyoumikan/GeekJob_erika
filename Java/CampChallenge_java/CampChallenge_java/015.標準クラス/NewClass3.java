/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
import java.util.Calendar;
/**
 *
 * @author guest1Day
 */

//現在の日時を「1988年5月21日 1時23分45秒」といった形式で表現
public class NewClass3 {
     public static void main(String[] args) {
        // カレンダーインスタンスの作成
        Calendar c = Calendar.getInstance();
        // 2017年8月12日 18時10分33秒
        c.set(1988, 5, 21, 1, 23, 45);

        // タイムスタンプ表示
        System.out.print(c.getTime());
    }

}
