<!DOCTYPE html>
<html lang="en">
<?php
    include '../phpScript/connection.php';
    include '../phpScript/phpScript.php';
?>
<body>
    <?php
         include '../layout/header.php';
    ?>

    <div id="contentPage">
    <h2>Daftar Jumlah Penggunaan Komputer</h2>
    <br>
    <span>Search berdasarkan id komputer:</span>
    <form class="row" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> method="post">
        <div class="form-group col-4">
            <input type="number" placeholder="Search.." name="search" class="form-control" id="searchBar">
            <button type="submit" class="btn btn-primary mt-5"><i class="fa fa-search"></i> Search</button>
        </div>
    </form>
    <br>
    <div class="row">
    <?php
         $stmt;
         $stmt1;
         if($_SERVER["REQUEST_METHOD"]=="POST"){
             if(isset($_POST["search"])){
                 if($_POST["search"]==null){
                     echo '<script type="text/javascript">alert("IdKomputer harus diisi");</script>';
                 }
                 else{
                     $sql = 'exec laporanPenggunaanKomputerSpesifik '.$_POST["search"].'';
                     $stmt = sqlsrv_query($conn,$sql);
     
                     if($stmt==false){
                         echo "Error in executing.\n";  
                         die( print_r( sqlsrv_errors(), true));  
                     }
                     else{
                         echo "<table class='table table-bordered table-striped '>";
                         echo "<thead>";
                             echo "<tr>";
                                 echo "<th>Id Komputer</th>";
                                 echo "<th>Jumlah Pengguna</th>";
                                 echo "<th>Durasi (Second) </th>";
                             echo "</tr>";
                         echo "</thead>";
                         echo "<tbody>";
                             echo "<tr>";
                                 while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                                 echo "<tr><td>".
                                     $row["FK_Komputer"]."</td><td>".
                                     $row["jumlah_penggunaan"]."</td><td>".
                                     $row["durasi"]."</td></tr>";
                                 } 
                             echo "</tr>";
                         echo "</tbody>";
                         echo "</table>";                       
                     }
                 }
             }
         }
         else{
             $sql1 = "exec selectAll 'agr_penggunaan_komputer'";
             $stmt1 = sqlsrv_query($conn,$sql1);
 
             echo "<table class='table table-bordered table-striped offset-2 col-8'>";
             echo "<thead>";
                 echo "<tr>";
                     echo "<th>Id Komputer</th>";
                     echo "<th>Jumlah Pengguna</th>";
                     echo "<th>Durasi (Second) </th>";
                 echo "</tr>";
             echo "</thead>";
             echo "<tbody>";
                 echo "<tr>";
                     while( $row = sqlsrv_fetch_array( $stmt1, SQLSRV_FETCH_ASSOC) ) {
                     echo "<tr><td>".
                         $row["FK_Komputer"]."</td><td>".
                         $row["jumlah_penggunaan"]."</td><td>".
                         $row["durasi"]."</td></tr>";
                     } 
                 echo "</tr>";
             echo "</tbody>";
             echo "</table>";  
         }
    ?>
        </div>

  </div>


</body>

</html>