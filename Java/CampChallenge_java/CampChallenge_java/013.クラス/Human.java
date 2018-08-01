
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

abstract class Human{
    
    ArrayList<Integer> myCards = new ArrayList<Integer>();
      
    abstract protected int open(); //abstractには何も処理を書かない合計値を返す！

    abstract protected void setCard(ArrayList<Integer> list);

    abstract protected boolean checkSum();

    }




//public abstract class Human { //Humanクラス
//  //フィールドの宣言
//  protected ArrayList<Integer> mycards = new ArrayList<>(); 
//  Random random = new Random();
//
//    public int open(){ //手札(mycards)の合計値を計算するメソッド
//        //手札の合計値を計算する処理
//        int num = 0;
//        for(int i = 0; i < mycards.size(); i++){
//            num += mycards.get(i);
//        }
//        return num; //合計値
//    }
//    
//    public void setCard(ArrayList<Integer> list){ //AllayListで受けたカード情報を手札(mycards)に追加する
//        //引いたカードを手札に追加(セット)する
//        for(int i = 0; i < list.size(); i++){
//            mycards.add(list.get(i));
//        } 
//      }
    
//    public boolean checkSum(){
//        //手札(mycards)を確認して、カードを引くか判断 (引くときtrue、引かないときfalse)
//        int num = 0;
//        
//        for(int i = 0;i< mycards.size(); i++){
//                    num += mycards.get(i);
//                }
//                if(num <= 16 ){//合計してから処理する
//                    return true;
//                }
//                else{
//                    return false;
//                }
//            }
        
//        if(int i > 0 && i < 21){
//            System.out.print("カードを引きます");
//            return true; //カードを引く処理
//        }else if(i > 21){
//            System.out.print("カードを引きません");
//            return false; //カードを引かない処理
//        }
//        
//        if(x > 0 && x < 21){
//            System.out.print("カードを引きます");
//            return true; //カードを引く処理
//        }else if(x > 21){
//            System.out.print("カードを引きません");
//            return false; //カードを引かない処理
//        }    
//        return sum;    
//   }
