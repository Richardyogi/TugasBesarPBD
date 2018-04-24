
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
public class DataAplikasiGenerator {

    private static String[] brand = {"Microsoft",
        "Adobe",
        "Android",
        "Unity",
        "AutoCad",
        "Astah",
        "Mozilla",
        "Windows",
        "Android",
        "Apple",
        "Eclipse",
        "Visual Studio",
        "Autodesk",
        "Flash",
        "Google"};

    private static String[] jenis = {"Pdf Reader",
        "Photoshop",
        "Word",
        "Power Point",
        "Excel",
        "Browser",
        "Music Player",
        "Database Management",
        "Code Editor",
        "IDE",
        "Text Editor",
        "Database Management",
        "Audition",
        "Bridge",
        "Dreamwever",
        "SQL Server",
        "Extension Manager",
        "Creative Cloud",
        "SmartDraw",
        "Device Central",
        "Analytics",
        "App Engine",
        "Calendar",
        "Cloud",
        "Draw",
        "Docs",
        "Drive",
        "Forms",
        "Maps",
        "Photos"};

    private static String[] aplikasi = new String[450];

    public static void main(String[] args) throws IOException {
        BufferedWriter writer = null;

        try {
            writer = new BufferedWriter(new FileWriter(
                    "Query Aplikasi.txt"));

        } catch (Exception e) {
            System.out.println(e.getMessage());
        }
        int i;
        //Generate untuk isi tabel User
        generateName();
        String temp;
        for (int j = 0; j < 450; j++) {
            temp = String.format("INSERT INTO Aplikasi VALUES ('%s');", aplikasi[j]);
            try {
                writer.write(temp);
                writer.newLine();
            } catch (Exception e) {
                System.out.println(e.getMessage());
            }
        }

        writer.close();

    }

    public static void generateName() {
        boolean done = false;
        int index = 0;
        int i;
        int length = jenis.length;
        for (i = 0; i < length; i++) {
            for (int l = 0; l < brand.length; l++) {
                    aplikasi[index++] =brand[l] + " " + jenis[i];
            }
        }
    }
}
