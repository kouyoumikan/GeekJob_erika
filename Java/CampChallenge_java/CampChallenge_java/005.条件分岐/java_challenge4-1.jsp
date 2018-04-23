<%-- 
    Document   : java_charenge4
    Created on : 2018/04/17, 10:18:30
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
        
        int num=0;
        if(num==1){
            out.print("1です！");
        }else if(num>=2){
            out.print("プログラミングキャンプ！");
        }else{
            out.print("その他です！");
        }
        
        %>
    </body>
</html>
