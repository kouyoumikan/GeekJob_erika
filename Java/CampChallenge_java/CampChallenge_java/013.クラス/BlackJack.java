
import java.util.ArrayList;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author guest1Day
 */
public class BlackJack{
    public static void main(String args[]){
        
//        ArrayList <Integer> mycards = new ArrayList<Integer>();
//        ArrayList <Integer> cards = new ArrayList<Integer>();
        
        User user = new User(); //Userクラスのインスタンス化
        Dealer dealer = new Dealer(); //Dealerクラスのインスタンス化
        
        // dealer.deal(); // 山札からカードを2枚引く
        dealer.setCard(dealer.deal()); // AllayList(deal())で受けたカード情報(山札からカードを2枚引く)を手札(mycards)に追加する
        user.setCard(dealer.deal()); // ディーラーから二枚カードを受け取る
        System.out.print("user:" + user.myCards); // ユーザーの手札合計
        System.out.print("dealer:" + dealer.myCards); // ディーラーの手札合計
        
        while(user.checkSum() == true){
            user.setCard(dealer.hit()); 
//            System.out.print("合計:" + user.open());
        }
        System.out.print("合計:" + user.open());
        
        while(dealer.checkSum() == true){
            dealer.setCard(dealer.hit()); 
//            System.out.print("合計:" + dealer.open());
        }
        System.out.print("合計:" + dealer.open());
        
        System.out.print("<br>");
        System.out.println("結果発表<br>");
        System.out.print("<br>");
       
        if(user.open() == dealer.open()){
            System.out.println("引き分け<br>");
        }else if(user.open() > dealer.open()){
            System.out.println("勝ちました！<br>");
        }else if(user.open() > 21){
            System.out.println("21を超えました。負けです。<br>");
        }else if(dealer.open() > 21){
            System.out.println("21を超えました。負けです。<br>");
        }else{
            System.out.println("負けました...<br>");
        }
     }
}