<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Calendar
 *
 * @author guest1Day
 */
class Calendar {
    // phpでカレンダー作成
    
    private $year;
    private $month;
    
    public function __construct($y, $m){
        $this -> year = $y;
        $this -> month = $m;
    }
 
public function create_rows(){
    $last_day = date("j", mktime(0, 0, 0, $time -> month + 1, 0, $this -> year));
    $rows = array();
    $row = self::init_row();
    
    for($i = 1; $i <= $last_day; $i++){
        $date = Date("w", mktime(0, 0, 0, $time -> month + 1, 0, $this -> year));
        $row[$date] = $i;
        
        if($date == 6 || $i == $last_day){
            $rows[] = $row;
            $row = self::init_row();
        }
    }
    return $rows;
}

//public function get_info(){
//    return $this -> year, "-", $this -> month;
//}

public static function init_row(){
    $ary = array();
    
    for($i = 0; $i <= 6; $i++){
        $ary[] = ".";
    }
    return $ary;
}

}

//$yeay = Date("Y"); // 今年
//$month = Date("n"); // 今月
//
//$cal = new Calendar($year, $month);
//
//<html>
//    <head>
//        <meta charset="UTF-8">
//        <title></title>
//        
//        <style>
//        
//        h1{ font-size: 18px : margin: 0 ; }
//        th{ background-color: cc6 ;  font-size: 13px : text-align: center ; }
//        td{ background-color: EEE ;  font-size: 13px : text-align: center ; }
//        
//        </style>
//        
//        input [type = "text"] { width: 35px ; }
        
//        <?php
//        
//        echo "<br>";
//        
//        ?>
        
<!--    </head>
    <body>
        
        <h1>
            
        //<?php
//        
//        echo $cal -> get_info();
//        
//        ?>
            
        </h1>
        
        <table>
            
        //<?php
//        
//        foreach($cal -> creat_rows() as $row){
//            echo "<tr>";
//            for($i = 0; $i <= 6; $i++){
//                echo "<td>", $row[$i], "</td>";
//            }
//            echo "</tr>";
//        }
//        ?>
        
        </table>    
    </body>
</html>-->