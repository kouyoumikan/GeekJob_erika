/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

import java.io.IOException;
import java.io.PrintWriter;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 *
 * @author guest1Day
 */
public class DB2 extends HttpServlet {

    /**
     * Processes requests for both HTTP <code>GET</code> and <code>POST</code>
     * methods.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html;charset=UTF-8");
        try (PrintWriter out = response.getWriter()) {
            /* TODO output your page here. You may use following sample code. */
            
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
      
      // SQLの送信
      db_st = db_con.prepareStatement("INSERT INTO profiles values(?, ?, ?, ?, ?)");
      db_st.setInt(1, 10);
      db_st.setString(2, "田中 実");
      db_st.setString(3, "012-345-6789");
      db_st.setInt(4, 30);
      db_st.setString(5, "1994-02-01");
      
      db_st.executeUpdate();

      String sql = "SELECT * FROM profiles";
      
  // SQLの実行 SELECT文にはexecuteQuery(sql)
     db_data = db_st.executeQuery(sql);
      
      //　結果の表示
      while(db_data.next()){
        out.print("プロフィールID：" + db_data.getInt("profilesID") + "<br>");
        out.print("名前：" + db_data.getString("name") + "<br>");
        out.print("電話番号：" + db_data.getInt("tel") + "<br>");
        out.print("年齢：" + db_data.getInt("age") + "<br>");
        out.print("生年月日：" + db_data.getDate("birthday") + "<br>");
     }
    //　インスタンスの正常クローズ
  db_data.close();
  db_st.close();
  db_con.close();
  
//　エラーハンドリング
} catch(SQLException e_sql){
        out.print("接続時にエラーが発生しました:" + e_sql.toString());
  }catch(Exception e){
        out.print("接続時にエラーが発生しました:" + e.toString());
  }
   
     // 例外時のDB接続のクローズ
     if (db_con != null){
  try {
    db_con.close();
  } catch (Exception e_con) {
      out.println(e_con.getMessage());
  }
}
     
        }
    }

    // <editor-fold defaultstate="collapsed" desc="HttpServlet methods. Click on the + sign on the left to edit the code.">
    /**
     * Handles the HTTP <code>GET</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    /**
     * Handles the HTTP <code>POST</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    /**
     * Returns a short description of the servlet.
     *
     * @return a String containing servlet description
     */
    @Override
    public String getServletInfo() {
        return "Short description";
    }// </editor-fold>

}
