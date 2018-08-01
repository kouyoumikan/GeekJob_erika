
import java.util.ArrayList;
import java.util.Random;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author guest1Day
 */

class User extends Human{ //Humanクラス
    
      //フィールドの宣言
       
      Random random = new Random();

      public int open(){ //手札(mycards)の合計値を計算するメソッド
        //手札の合計値を計算する処理
        int num = 0;
        for(int i = 0; i < myCards.size(); i++){
            num += myCards.get(i);
        }
        return num; //合計値
      }
    
      public void setCard(ArrayList<Integer> list){ //AllayListで受けたカード情報を手札(mycards)に追加する
        //引いたカードを手札に追加(セット)する
        for(int i = 0; i < list.size(); i++){
            myCards.add(list.get(i));
        } 
      }
    
      public boolean checkSum(){
        //手札(mycards)を確認して、カードを引くか判断 (引くときtrue、引かないときfalse)
        int num = 1;
        
        for(int i = 1; i < myCards.size(); i++){
            num += myCards.get(i);
        }
          if(num <= 21 ){ // 合計してから処理する
            System.out.print("カードを引きます");
            return true;
          }else{
            System.out.print("カードを引きません");
            return false;
          }
      }
}
