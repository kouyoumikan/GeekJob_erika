<%-- 
    Document   : java_challenge5-3
    Created on : 2018/04/17, 11:16:26
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
        <%@ page import="java.util.*" %>
        
        <%
         //keyの宣言   
        HashMap<String,String>key=new HashMap<String,String>();
        //keyにキーと値を格納
        key.put("1", "AAA");
        key.put("hello", "world");
        key.put("soeda", "33");
        key.put("20", "20");
        //keyからデータを取得する
        out.print(key.get("1")+"<br>");
        out.print(key.get("hello")+"<br>");
        out.print(key.get("soeda")+"<br>");
        out.print(key.get("20")+"<br>");
        //keyを入れる配列
        ArrayList<HashMap>data=new ArrayList<HashMap>();
        //keyを格納
        data.add(key);
        

        %>
    </body>
</html>
