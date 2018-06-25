/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
import java.io.PrintWriter;
import java.sql.*;
/**
 *
 * @author guest1Day
 */
public class DB1 {
    public static void main(String[] args, PrintWriter out) {
  // 接続するメソッド
  Connection db_con = null;
  PreparedStatement db_st = null;
  ResultSet db_data = null;
  
     // JDBCドライバの読み込み
     try {
      Class.forName("com.mysql.jdbc.Driver").newInstance(); 
      // getConnectionのJDBCドライバURL
      String url="jdbc:mysql://localhost:3306/challenge1_db";
      
      // データベースに接続
      db_con = DriverManager.getConnection(url, "kouyou", "kouyou136");
      
      //ageが33のデータを習得（ SQLの送信）
      db_st = db_con.prepareStatement("select * from sample where age = ?");
      db_st.setInt(1, 33);
      
      db_data = db_st.executeQuery();
      
  while(db_data.next()){
       
      out.print("名前：" + db_data.getString("name") + "<br>");
      
   }  
     //　インスタンスの正常クローズ
  db_data.close();
  db_st.close();
  db_con.close();
  
//　エラーハンドリング （正常クローズしなかった場合の処理）
} catch(SQLException e_sql){
        System.out.print("接続時にエラーが発生しました:" + e_sql.toString());
  }catch(Exception e){
        System.out.print("接続時にエラーが発生しました:" + e.toString());
  }
    }
    
}
