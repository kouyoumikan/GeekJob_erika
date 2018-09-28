package WebAPI;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

import com.fasterxml.jackson.core.JsonFactory;
import com.fasterxml.jackson.core.JsonParser;
import com.fasterxml.jackson.databind.JsonNode;
import com.fasterxml.jackson.databind.ObjectMapper;
import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.PrintWriter;
import java.net.HttpURLConnection;
import java.net.URL;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 *
 * @author guest1Day
 */
public class NewServlet extends HttpServlet {

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
            
            request.setCharacterEncoding("UTF-8");
            
            String urlString = "http://shopping.yahooapis.jp/ShoppingWebService/V1/json/itemSearch?appid=dj00aiZpPUtJZkk3Z09nSnVORiZzPWNvbnN1bWVyc2VjcmV0Jng9ODU-&query=%E8%AE%83%E5%B2%90%E3%81%86%E3%81%A9%E3%82%93";
            String result = ""; // urlStringの中身を取り出すresult ①
        
            try{
                URL url = new URL(urlString);
                HttpURLConnection con = (HttpURLConnection) url.openConnection();
                con.connect();
                BufferedReader in = new BufferedReader(new InputStreamReader(
                con.getInputStream()));
                
            String tmp = "";
        
            while ((tmp = in.readLine()) != null) {
                result += tmp;
            }
            
                in.close();
                con.disconnect();
        
            }catch(Exception e){
                e.printStackTrace();
            }

            out.println("<!DOCTYPE html>");
            out.println("<html>");
            out.println("<head>");
            out.println("<title>Servlet NewServlet1</title>");            
            out.println("</head>");
            out.println("<body>");
            out.println("<h1>Servlet NewServlet1 at " + request.getContextPath() + "</h1>");
//            out.println(result);
        JsonNode date = getJsonNode(result); // resultをJsonNode型に代入 ③
//        out.println(date);
        
        //out.println(date.get("ResultSet").get("0").get("Result").get("0") + "<br>"); //Resultの中の0のデータすべて習得 ④

        out.println(date.get("ResultSet").get("0").get("Result").get("3").get("Name").asText() + "<br>");
        // //Resultの中の3.Nameのデータ習得
        // .asText()は最後のデータまで指定していた場合のみ使用できる
        
        out.println(date.get("ResultSet").get("0").get("Result").get("2").get("Headline").asText() + "<br>");
        
            out.println("</body>");
            out.println("</html>");
        }
            
        }
    

    public static JsonNode getJsonNode(String jsonString){
        // 取り出したresultデータをJsonNodeに変換する ②
        JsonNode head = null;
        
        try{
            JsonFactory jfactory = new JsonFactory();
            JsonParser parser = jfactory.createJsonParser(jsonString);
            ObjectMapper mapper = new ObjectMapper();
            head = mapper.readTree(parser);
            
        }catch(Exception e){
            e.printStackTrace();
        }
        return head; // JsonNodeに変換したresultデータ
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
