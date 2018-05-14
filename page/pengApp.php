<!DOCTYPE html>
<html lang="en">
<?php
    include '../phpScript/connection.php';
    include '../phpScript/phpScript.php';
?>

<body>
    <?php
        include ('../layout/header.php');
    ?>


    <div id="contentPage">
        <h2>Daftar Penggunaan Aplikasi</h2>
        <br>
        <span>Search berdasarkan nama aplikasi:</span>
        <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> method="post">
            <div class="search-container">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit"><i class="fa fa-search"></i></button>
            </div>
        </form>
        <br>
        <?php
             $stmt;
             $stmt1;
             if($_SERVER["REQUEST_METHOD"]=="POST"){
                 if(isset($_POST["search"])){
                     if($_POST["search"]==null){
                         echo '<script type="text/javascript">alert("Nama Aplikasi harus diisi");</script>';
                     }
                     else{
                         $sql = 'exec laporanPenggunaApplikasi "' .$_POST["search"].'" ';
                         $stmt = sqlsrv_query($conn,$sql);
         
                         if($stmt==false){
                             echo "Error in executing.\n";  
                             die( print_r( sqlsrv_errors(), true));  
                         }
                         else{
                             echo "<table class='table table-bordered table-striped'>";
                             echo "<thead>";
                                 echo "<tr>";
                                     echo "<th>Id</th>";
                                     echo "<th>Nama Aplikasi</th>";
                                     echo "<th>Jumlah Penggunaan </th>";
                                 echo "</tr>";
                             echo "</thead>";
                             echo "<tbody>";
                                 echo "<tr>";
                                     while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                                     echo "<tr><td>".
                                         $row["IdAplikasi"]."</td><td>".
                                         $row["NamaAplikasi"]."</td><td>".
                                         $row["JumlahPengguna"]."</td></tr>";
                                     } 
                                 echo "</tr>";
                             echo "</tbody>";
                             echo "</table>";                       
                         }
                     }
                 }
             }
             else{
                 $sql1 = "SELECT * from agr_penggunaan_aplikasi join aplikasi on agr_penggunaan_aplikasi.FK_Aplikasi=id_aplikasi";
                 $stmt1 = sqlsrv_query($conn,$sql1);
     
                 echo "<table class='table table-bordered table-striped'>";
                 echo "<thead>";
                     echo "<tr>";
                     echo "<th>Id</th>";
                     echo "<th>Nama Aplikasi</th>";
                     echo "<th>JumlahP Penggunaan </th>";
                     echo "</tr>";
                 echo "</thead>";
                 echo "<tbody>";
                     echo "<tr>";
                          while( $row = sqlsrv_fetch_array( $stmt1, SQLSRV_FETCH_ASSOC) ) {
                             echo "<tr><td>".
                             $row["FK_Aplikasi"]."</td><td>".
                             $row["NamaAplikasi"]."</td><td>".
                             $row["jumlah_pengguna"]."</td><td></tr>";
                         }
                     echo "</tr>";
                 echo "</tbody>";
                 echo "</table>";  
             }
        ?>
     
    </div>

</body>

</html>