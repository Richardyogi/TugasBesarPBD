<!DOCTYPE html>
<html lang="en">
<?php
    include 'connection.php';
    include 'phpScript.php';
?>

<body>
    <?php
        include 'header.php';
    ?>

    <div id="contentPage">
        <h2>Tabel Catatan Pengguna di Range 1 Jam</h2>
        <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> method="post">
        <div class="search-container">
            <input type="text" placeholder="Search.." name="tglCatat">
            <button type="submit">Tanggal<i class="fa fa-search"></i></button>
            
        </div>
        <div class="search-container" style="margin-top:1%;">
            <input type="text" placeholder="Search.." name="jamCatat">
            <button type="submit">Jam<i class="fa fa-search"></i></button>
        </div>
        </form>
        <br>
        
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Jumlah Penggunaan</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $stmt;
                $stmt1;
                    if($_SERVER["REQUEST_METHOD"]=="POST"){

                        if(isset($_POST["tglCatat"])){
                            if($_POST["tglCatat"]==null){
                                echo '<script type="text/javascript">alert("pencaharian tanggal harus diisi");</script>';
                            }
                            else{
                                $sql = 'exec daftarPenggunaPerjamTGL '. $_POST["tglCatat"].'';
                                $stmt = sqlsrv_query($conn,$sql);
                                
                                if($stmt == false){
                                    echo "Error exec.\n";
                                    die(print_r(sqlsrv_errors(),true));
                                }
                                else{
                                    echo "<table class='table table-bordered table-striped'>";
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>Tanggal</th>";
                                            echo "<th>Start Time</th>";
                                            echo "<th>End Time</th>";
                                            echo "<th>Jumlah Penggunaan</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                        echo "<tr>";
                                            while( $row = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){
                                            echo "<tr><td>".
                                             $row["tanggal"]."</td><td>".
                                             $row["start_time"]."</td><td>". 
                                             $row["end_time"]."</td><td>".
                                             $row["jumlah_pengguna"]."</td></tr>";
                                          }
                                        echo"</tr>";
                                    echo "</tbody>";
                                    echo "</table>";
                                }
                                
                                //$rs = sqlsrv_query( $conn,$sql);
                                //while( $row = sqlsrv_fetch_array( $rs, SQLSRV_FETCH_ASSOC) ) {
                                //    echo "<tr><td>".$row["tanggal"]->format('d-m-Y')."</td><td>".
                                //    $row["start_time"]->format('H:i:s')."</td><td>".
                                //    $row["end_time"]->format('H:i:s')."</td><td>".
                                //    $row["jumlah_pengguna"]."</td></tr>";
                                // }
                            }
                        }

                        else if(isset($_POST["jamCatat"])){
                            if($_POST["jamCatat"]==null){
                                echo '<script type="text/javascript">alert("pencaharian jam harus diisi");</script>';
                            }
                            else{
                                $sql = 'exec daftarPenggunaPerjamJAM '. $_POST["jamCatat"].'';
                                $stmt1 = sqlsrv_query($conn,$sql);
                                
                                if($stmt == false){
                                    echo "Error exec.\n";
                                    die(print_r(sqlsrv_errors(),true));
                                }
                                
                                else{
                                    echo "<table class='table table-bordered table-striped'>";
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>Tanggal</th>";
                                            echo "<th>Start Time</th>";
                                            echo "<th>End Time</th>";
                                            echo "<th>Jumlah Penggunaan</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                        echo "<tr>";
                                            while( $row = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){
                                            echo "<tr><td>".
                                             $row["tanggal"]."</td><td>".
                                             $row["start_time"]."</td><td>". 
                                             $row["end_time"]."</td><td>".
                                             $row["jumlah_pengguna"]."</td></tr>";
                                          }
                                        echo"</tr>";
                                    echo "</tbody>";
                                    echo "</table>";
                                }
                            }

                        }
                       
                    



                  //  else{
                  //      $sql = "exec selectAll 'agr_jumlah_pengguna_per_jam'";
                  //      $rs = sqlsrv_query( $conn,$sql);
                       // while( $row = sqlsrv_fetch_array( $rs, SQLSRV_FETCH_ASSOC) ) {
                           // echo "<tr><td>".$row["tanggal"]->format('d-m-Y')."</td><td>".
                           // $row["start_time"]->format('H:i:s')."</td><td>".
                           // $row["end_time"]->format('H:i:s')."</td><td>".
                         //   $row["jumlah_pengguna"]."</td></tr>";
                       // }
                    }

                   
                  
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>