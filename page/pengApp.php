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
        <form class="row" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> method="post">
            <div class="form-group col-4">
                <input type="text" placeholder="Search.." name="search" class="form-control">
                <button type="submit" class="btn btn-primary mt-4"><i class="fa fa-search"></i> Search</button>            
            </div>
        </form>
        <br>
        <span>Search berdasarkan id aplikasi:</span>
        <form class="row" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> method="post">
            <div class="form-group col-4">
                <input type="number" placeholder="Search.." name="searchById"class="form-control">
                <button type="submit" class="btn btn-primary mt-4"><i class="fa fa-search"></i>Search</button>
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
                         echo '<script type="text/javascript">alert("Nama Aplikasi harus diisi");</script>';
                     }
                     else{
                         $sql = 'exec laporanPenggunaAplikasi "' .$_POST["search"].'",null';
                         $stmt = sqlsrv_query($conn,$sql);
                        
                         if($stmt==false){
                             echo "Error in executing.\n";  
                             die( print_r( sqlsrv_errors(), true));  
                          }
                         else{
                             echo "<table class='table table-bordered table-striped  '>";
                             echo "<thead>";
                                 echo "<tr>";
                                     echo "<th>Id</th>";
                                     echo "<th>Nama Aplikasi</th>";
                                     echo "<th>Jumlah Penggunaan</th>";
                                 echo "</tr>";
                             echo "</thead>";
                             echo "<tbody>";
                                 
                           
                                     while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                                     echo "<tr><td>".
                                         $row["IdAplikasi"]."</td><td>".
                                         $row["NamaAplikasi"]."</td><td>".
                                         $row["JumlahPengguna"]."</td></tr>";
                                     } 
                                 
                             echo "</tbody>";
                             echo "</table>";                       
                         }
                     }
                 }
                 
                 if(isset($_POST["searchById"])){
                    if($_POST["searchById"]==null){
                        echo '<script type="text/javascript">alert("Id Aplikasi harus diisi");</script>';
                    }
                    else{
                        $sql = 'exec laporanPenggunaAplikasi null, '.$_POST["searchById"];
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
                                    echo "<th>Jumlah Penggunaan</th>";
                                echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                                
                              
                                    while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                                    echo "<tr><td>".
                                        $row["IdAplikasi"]."</td><td>".
                                        $row["NamaAplikasi"]."</td><td>".
                                        $row["JumlahPengguna"]."</td></tr>";
                                    } 
                                
                            echo "</tbody>";
                            echo "</table>";                       
                        }
                    }
                 }
             }
             else{
                 $sql1 = "exec laporanPenggunaAplikasi null, null";
                 $stmt1 = sqlsrv_query($conn,$sql1);
     
                 echo "<table class='table table-bordered table-striped  offset-2 col-8 '>";
                 echo "<thead>";
                     echo "<tr>";
                     echo "<th>Id</th>";
                     echo "<th>Nama Aplikasi</th>";
                     echo "<th>JumlahP Penggunaan </th>";
                     echo "</tr>";
                 echo "</thead>";
                 echo "<tbody>";
                     
                          while( $row = sqlsrv_fetch_array( $stmt1, SQLSRV_FETCH_ASSOC) ) {
                             echo "<tr><td>".
                             $row["IdAplikasi"]."</td><td>".
                             $row["NamaAplikasi"]."</td><td>".
                             $row["JumlahPengguna"]."</td></tr>";
                         }
                
                 echo "</tbody>";
                 echo "</table>";  
             }
        ?>
        </div>
    </div>

</body>

</html>