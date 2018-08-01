
import java.util.ArrayList;
import java.util.Random;
import java.util.Collections;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author guest1Day
 */
class Dealer extends Human{ // Humanクラスを継承 
     
    ArrayList<Integer> cards = new ArrayList<Integer>();  // ゲームで配る山札(デッキ)
     
    // コンストラクタ (山札にすべてのカード(13*4=52)を追加)
       public Dealer(){
        for(int n = 1; n <= 4; n++){ 
        // for文の中にfor文を書くことによって13枚のカードをcardsにaddする処理を４回繰り返すことができる
            for (int i = 1; i <= 13; i++ ){ // 13枚のトランプをプリントしてcardsに入れる処理
                cards.add(i); // i = 52
            }
        Collections.shuffle(cards); // シャッフルして、順番を変える
        }   
    }
    
     // 山札からカードを2枚ランダムに引き、引いたカードを戻り値にする
     public ArrayList<Integer> deal(){ // 山札からカードを2枚引く処理
        ArrayList<Integer> data2 = new ArrayList<Integer>();
        //乱数取得R
        Random rand = new Random();
        
        Integer index = rand.nextInt(cards.size());
        data2.add(cards.get(index)); //　山札からカードを2枚引くために更新
        
        Integer index1 = rand.nextInt(cards.size());
        data2.add(cards.get(index1)); // 二枚目のカードをランダムに引く
        
        return data2; // 引いたカード
    } 
     
     // 山札からカードを1枚ランダムに引き、引いたカードを戻り値にする
     public ArrayList<Integer> hit(){ // 山札からカードを1枚引く処理
        // 乱数取得R
        Random rand = new Random();
        Integer index = rand.nextInt(cards.size());

        ArrayList<Integer> data1 = new ArrayList<Integer>();
        data1.add(index);
          
        return data1; // 引いたカード   
    }
     
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
        int num = 0;
        
        for(int i = 0;i < myCards.size(); i++){
            num += myCards.get(i);
        }
          if(num <= 21 ){//合計してから処理する
            System.out.print("カードを引きます");
            return true;
          }
          else{
            System.out.print("カードを引きません");
            return false;
          }
      }
}

