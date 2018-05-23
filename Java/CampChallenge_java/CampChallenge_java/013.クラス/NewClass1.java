

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author guest1Day
 */
//クラスの宣言
public class NewClass1{
    //フィールドの宣言
     int num;
     double gas;
    
    //メソッドの宣言
    void setNumGas(int n, double g){
        num = n;
        gas = g;
       // out.print("車のナンバーを" + num + "にガソリン量を" + gas + "にしました。");
    }
   
}

class RacingCar extends NewClass1{
    public void Car(){
        String msg = ("ナンバー" + num + "ガソリン量" + gas + "になりました。");
        System.out.println(msg);
    }
       
}

class Sample{
    public static void main(){
        NewClass car1 = new NewClass(); //Carクラスのインスタンス生成
        
        car1.setNumGas(1234, 30.5); //car1インスタンスのsetNumGasメソッドを利用
        
    }
    public static void main(String[] args){
        RacingCar car2 = new RacingCar(); //継承を利用して作成したRacingCarインスタンス作成
        
        car2.setNumGas(1234, 30.5); //親クラスを利用
        car2.Car(); //RacingCar独自のメソッドCar
    }
} 



