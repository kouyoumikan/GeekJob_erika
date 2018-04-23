<%-- 
    Document   : java_challenge4-3
    Created on : 2018/04/17, 10:42:53
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
       char[] name={'A','あ'};
       String c= new String(name);
       int a='A';
            
       switch( a ){
           case 'A':
           out.print("英語");
           break;
           
           case 'あ':
           out.print("日本語");
           break;
           
           default:
              
       }
       
        
        %>
    </body>
</html>
