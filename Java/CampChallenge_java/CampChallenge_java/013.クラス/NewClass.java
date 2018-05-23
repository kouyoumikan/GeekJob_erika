
import java.io.PrintWriter;

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
public class NewClass{
    //フィールドの宣言
    private int num;
    private double gas;
    
    //メソッドの宣言
    void setNumGas(int n, double g){
        num = n;
        gas = g;
       // out.print("車のナンバーを" + num + "にガソリン量を" + gas + "にしました。");
    }
   
}

class Test{
    void main(){
        NewClass car1=new NewClass(); //Carクラスのインスタンス生成
        
        car1.setNumGas(1234, 30.5); //car1インスタンスのsetNumGas
        
    }
} 

