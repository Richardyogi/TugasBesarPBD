
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
 * @author Spectre
 */
public class DataRoundRobinGenerator {
    public static void main(String[] args) throws IOException{
        BufferedWriter writer = null;

        try {
            writer = new BufferedWriter(new FileWriter(
                    "Query Round Robin.txt"));

        } catch (Exception e) {
            System.out.println(e.getMessage());
        }
        int i;
        //Generate untuk isi tabel User
        String temp;
       
            
            for (int k = 0; k < 50000; k++) {
                 temp = String.format("INSERT INTO RoundRobin VALUES (null, null, null, null, null, null);");
                try{
                    writer.write(temp);
                    writer.newLine();
                }catch (Exception e){
                    System.out.println(e.getMessage());
                }
            }
           
        
        

        

        writer.close();
    }
}
