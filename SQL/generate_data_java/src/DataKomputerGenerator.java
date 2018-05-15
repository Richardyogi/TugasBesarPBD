
import java.io.BufferedWriter;
import java.io.FileWriter;
import java.io.IOException;
import java.util.Random;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 *
 * @author Arlin Shiffa
 */
public class DataKomputerGenerator {

    private static String[] ruangan = {"09016", "09017", "09018", "09020", "09021"};

    public static void main(String[] args) throws IOException {
        BufferedWriter writer = null;

        try {
            writer = new BufferedWriter(new FileWriter(
                    "Query Komputer.txt"));

        } catch (Exception e) {
            System.out.println(e.getMessage());
        }
        int i;
        //Generate untuk isi tabel User
        String temp;
        for (int j = 0; j < 5; j++) {
            
            for (int k = 0; k < 40; k++) {
                 temp = String.format("INSERT INTO Komputer VALUES ('%s');", ruangan[j]);
                try{
                    writer.write(temp);
                    writer.newLine();
                }catch (Exception e){
                    System.out.println(e.getMessage());
                }
            }
           
        }
        

        

        writer.close();
    }

}
