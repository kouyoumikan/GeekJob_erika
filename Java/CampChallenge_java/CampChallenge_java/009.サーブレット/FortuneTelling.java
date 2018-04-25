/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package org.camp.servlet;

import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 *
 * @author guest1Day
 */
import java.util.Random;
@WebServlet(name = "FortuneTelling", urlPatterns = {"/FortuneTelling"})
public class FortuneTelling extends HttpServlet {

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
          
            
            //おみくじの運勢　種類
            String luckList[]={"大大吉","大吉","向大吉","末大吉","中吉","小吉","吉","半吉","後吉","末吉","凶","小凶","半凶","末凶","大凶"};
            //乱数クラス生成
            Random rand=new Random();
            //乱数取得
            Integer index=rand.nextInt(luckList.length);
            //取得した値を出力 
             
            out.print("あなたの今日の運勢は・・・");
            
            Random random=new Random();
            int i=random.nextInt(100);
            
            //おみくじの確率
            if(0<=i&&i<=1){
                out.print("大大吉です！");
            }else if(1<=i&&i<=5){
                out.print("大吉です！");
            }else if(5<=i&&i<=10){
                out.print("向大吉です！");
            }else if(10<=i&&i<=15){
                out.print("末大吉です！");
            }else if(15<=i&&i<=20){
                out.print("中吉です！");
            }else if(20<=i&&i<=30){
                out.print("小吉です！");
            }else if(30<=i&&i<=40){
                out.print("吉です！");
            }else if(40<=i&&i<=50){
                out.print("半吉です！");
            }else if(50<=i&&i<=55){
                out.print("後吉です！"); 
            }else if(55<=i&&i<=60){
                out.print("末吉です！");  
            }else if(60<=i&&i<=75){
                out.print("凶です！"); 
            }else if(75<=i&&i<=80){
                out.print("小凶です！"); 
            }else if(85<=i&&i<=90){
                out.print("半凶です！"); 
            }else if(90<=i&&i<=95){
                out.print("末凶です！"); 
            }else{
                out.print("大凶です");
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

    /**
     * Returns a short description of the servlet.
     *
     * @return a String containing servlet description
     */


