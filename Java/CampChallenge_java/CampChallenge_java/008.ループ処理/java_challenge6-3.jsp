<%-- 
    Document   : java_challenge6-3
    Created on : 2018/04/23, 13:16:25
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
        //0から100の合計を表示する処理
        int total=0;
        for(int i=0; i<100; i++){
            total=total+i;
        }
        out.print(total);
        
        %>
    </body>
</html>
