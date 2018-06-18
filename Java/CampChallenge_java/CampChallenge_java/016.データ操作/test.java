/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 *
 * @author guest1Day
 */
public class test extends HttpServlet {

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

            request.setCharacterEncoding("UTF-8");

        String URL = "http://localhost:8080/_WebApplication1_project_/_html3_file_.jsp?total=1500&count=10&type=2";


//        String sougaku = request.getParameter("total");
//        String suuryou = request.getParameter("count");
//        String shubetsu = request.getParameter("type");
        

        // type の値を元に，商品種別の日本語情報を表示
        int type = 2;
        
        switch(type){
            case 1:
                out.print("雑貨" + "<br>");
                break;
            case 2:
                out.print("生鮮食品" + "<br>");
                break;
            case 3:
                out.print("その他" + "<br>");
                break;
        }
        
        // 商品の単価を求め，画面に表示
        int total = 1500;
        int count = 10;
        
        int tanka = (total / count);
        out.print("商品単価は" + tanka + "円です" + "<br>");
        
        int sougaku = total * count;
        int suuryou = count;
        int shubetsu = type;
        
        // 商品購入総額に応じてポイントを計算し，その値を画面に表示
        // ポイントの計算は，商品購入総額を基準にして行います
        double point = sougaku / suuryou;
        
         if(point > 0){
            out.print("ポイントが発生しました" + "<br>");
        }else{
            out.print("ポイントが発生しませんでした" + "<br>");
        }
        
         
        if(sougaku <= 3000){ // 3000 円未満 ... 0%
            out.print("ポイントは" + (point * 0) + "です" + "<br>");
        }else if(sougaku >= 3000 && sougaku <= 5000){ //3000 円以上で5000円未満 ... 購入総額の 4%
            out.print("ポイントは" + (point * 0.04) + "です" + "<br>");
        }else if(sougaku >= 5000){ // 5000 円以上 ... 購入総額の 5%
            out.print("ポイントは" + (point * 0.05) + "です" + "<br>");
        }

            
       // テキストボックスの情報
//        out.print(request.getParameter("total"));
//        out.print(request.getParameter("count"));
//        out.print(request.getParameter("type"));
          
            out.println("<!DOCTYPE html>");
            out.println("<html>");
            out.println("<head>");
            out.println("<title>Servlet test</title>");
            out.println("</head>");
            out.println("<body>");

            out.println("総額は" + sougaku + "です" + "<br>");
            out.println("数量は" + suuryou + "です" + "<br>");
            out.println("商品は" + shubetsu + "です" + "<br>");

            out.println("<h1>Servlet test at " + request.getContextPath() + "</h1>");

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
