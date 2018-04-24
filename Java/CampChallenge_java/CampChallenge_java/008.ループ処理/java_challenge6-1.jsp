<%-- 
    Document   : challenge6-1
    Created on : 2018/04/23, 13:14:58
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
        int answer=8;
       
        for(int a=1; a<8; a++){
            answer = answer *20;
            
        }
       
        out.print(answer);
        
        %>
    </body>
</html>
