<%-- 
    Document   : java_challenge5-2
    Created on : 2018/04/17, 11:15:49
    Author     : guest1Day
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <%@ page import="java.util.ArrayList" %> 
        
        <%
        
        ArrayList<String>data= new ArrayList<String>();
        // 各要素を格納させる
        data.add("10");
        data.add("100");
        data.add("soeda");
        data.add("hayashi");
        data.add("-20");
        data.add("118");
        data.add("END");
       
        data.set(2, "33"); // "soeda"を33に変更
        
       out.print(data.get(4)+ "<br>");
       out.print(data.get(0)+ "<br>");
       out.print(data.get(2)+ "<br>");
       out.print(data.get(1)+ "<br>"); 
       out.print(data.get(5)+ "<br>");
       out.print(data.get(3)+ "<br>");
       out.print(data.get(6)+ "<br>");
        // 各要素を表示させる
        %>
        
    </body>
</html>
