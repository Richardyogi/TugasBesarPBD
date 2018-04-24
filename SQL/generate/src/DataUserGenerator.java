
import java.io.BufferedWriter;
import java.io.FileWriter;
import java.io.IOException;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Arlin Shiffa
 */
public class DataUserGenerator {
    
    private static String[] namaDepan ={"Arlin", "Himawan", "Edrick", "Cornelius","Richard", "Adriswara", 
        "Taliida", "Fadhil","Patrick","Hizkia"};
    
    private static String[] namaTengah ={"Sasqia","Puspa","Emmanuel","Muhammad","Sarasvati","David","Ezra",
    "Saputra","Wijaya","Made"};
    
    private static String[] namaBelakang = {"Herianto","Rosadi","Radityatama","Stevan","Danianto",
    "Pattinson","Suprayogi","Kinanti","Utama","Budiman"};
    
    private static String[] user = new String[1000];
    
    public static void main(String[] args) throws IOException{
        BufferedWriter writer = null;
        
        
        try{
            writer = new BufferedWriter(new FileWriter(
                    "Query User.txt"));
           
        }catch (Exception e){
            System.out.println(e.getMessage());
        }
        int i;
        //Generate untuk isi tabel User
        generateName();
        String temp;
        for (int j = 0; j < 1000; j++) {
            temp = String.format("INSERT INTO pengguna VALUES ('%s');", user[j]);
            try{
                writer.write(temp);
                writer.newLine();
            }catch (Exception e){
                System.out.println(e.getMessage());
            }
        }
        
        writer.close();
        
        
    }
    
    public static void generateName(){
        boolean done = false;
        int index = 0;
        int i;
        int length = namaDepan.length;
        for (i = 0; i < length; i++) {
            for (int l = 0; l < length; l++) {
                for (int j = 0; j < length; j++) {
                   
                        user[index++]= namaDepan[j]+" "+namaTengah[l]+" "
                                +namaBelakang[i];
                    
                }
            }
        }
    }
}
