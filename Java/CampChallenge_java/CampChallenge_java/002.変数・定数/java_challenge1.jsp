<%-- 
    Document   : java_challenge1
    Created on : 2018/04/11, 15:31:07
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
       
        <%
           
            String name="私の名前は";
            name+="小林英里香です。";
            out.print(name +"<br>");
            
            String text="好きな食べ物は";
            text+="みかんです。";
            out.print(text +"<br>");
            
            String time= "4/12";
            String message="今日の日付は"+ time +"水曜日です。";
            out.print(message);
            
%>

    </body>
</html>