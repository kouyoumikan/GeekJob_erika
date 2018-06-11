/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.ServletException;
import javax.servlet.http.Cookie;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;

/**
 *
 * @author guest1Day
 */
public class profile extends HttpServlet {

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
            
             // 受け取るパラメータの文字コード
       request.setCharacterEncoding("UTF-8");
       
       String name = request.getParameter("txtName");
       String seibetsu = request.getParameter("rdoSample");
       String syumi = request.getParameter("mulText");
       
       
            // セッションへ"Data"という名前で現在時刻を登録
            HttpSession date = request.getSession();

            // セッションへ登録
             date.setAttribute("txtName", name);
            
            // セッションから情報を取得 -- Data
            String data =(String)date.getAttribute("txtName");
           
            HttpSession date2 = request.getSession();
            date.setAttribute("rdoSample", seibetsu);
            String data2 =(String)date.getAttribute("rdoSample");
           
           // セッションへ"Data"という名前で現在時刻を登録
            HttpSession date3 = request.getSession();
            date.setAttribute("mulText", syumi);
            String data3 =(String)date.getAttribute("mulText");
            
             System.out.print(data);
             System.out.print(data2);
             System.out.print(data3);
            
            out.println("<!DOCTYPE html>");
            out.println("<html>");
            out.println("<head>");
            out.println("<title>Servlet profile</title>");            
            out.println("</head>");
            out.println("<body>");
            
            out.print("私の名前は"+ name +"です" + "<br>");
            out.print("性別は"+ seibetsu +"です" + "<br>");
            out.print("趣味は"+ syumi +"です" + "<br>");
            
            out.println("<h1>Servlet profile at " + request.getContextPath() + "</h1>");
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
