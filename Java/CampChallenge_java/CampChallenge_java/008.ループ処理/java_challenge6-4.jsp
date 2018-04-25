<%-- 
    Document   : java_challenge6-4
    Created on : 2018/04/24, 11:14:55
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
            
        int num=1000;
        
        while(num>100){ //numを2で割った余りが100より大きい場合ループ
            num=num/2;//19行目から21行目までwhileの領域            
        }
        out.print(num);
        
        out.print("<br>");

        int i=10000; //iを2で割ると4000より小さくする
        
        while(i>4000){ //iが4000より大きいとループ
            i=i/2; //iは10000を2で割り続けた数字
        }
        out.print(i); //ループ後の結果
        

        %>
    </body>
</html>
