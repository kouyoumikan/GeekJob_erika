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
public class DB13 extends HttpServlet {

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
      String url="jdbc:mysql://localhost:3306/sample_db";
      
      // データベースに接続
      db_con = DriverManager.getConnection(url, "test", "test");
     
      // ユーザー情報管理テーブル
      db_st = db_con.prepareStatement("SELECT * FROM user");
      
      // INSERT INTO user VALUES
    // -> (0001, '高橋　太郎', 25, '男', '東京都', 1),
    // -> (0003, '山口　花子', 21, '女', '京都市', 3);
      
      db_data = db_st.executeQuery();

                  while(db_data.next()){
        out.print("ユーザーID：" + db_data.getInt("userID") + "<br>");
        out.print("名前：" + db_data.getString("name") + "<br>");
        out.print("年齢：" + db_data.getInt("age") + "<br>");
        out.print("性別：" + db_data.getString("sex") + "<br>");
        out.print("住所：" + db_data.getString("address") + "<br>");
        out.print("商品ID：" + db_data.getInt("productID") + "<br>");
        
        out.println("<p><a href=\"./db13-1.html\">商品情報登録を見る</a></p>");
        out.println("<p><a href=\"./db13-2.html\">商品一覧機能を見る</a></p>");
        out.println("<p><a href=\"./db13.html\">ログイン画面に戻る</a>");
        out.print("<br>");
     }
  
  db_data.close();
  db_st.close();
  db_con.close();

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
            
            request.setCharacterEncoding("UTF-8");
            
            out.println("<!DOCTYPE html>");
            out.println("<html>");
            out.println("<head>");
            out.println("<title>Servlet DB13</title>");            
            out.println("</head>");
            out.println("<body>");
            out.println("<h1>Servlet DB13 at " + request.getContextPath() + "</h1>");
            out.println("</body>");
            out.println("</html>");
            
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
