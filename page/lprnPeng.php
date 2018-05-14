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
        <h2>Laporan Pengguna</h2>
        <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> method="post">
        <div class="search-container">
            <input type="number" placeholder="Search.." name="search" class="form-inline" name="user">
            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>        </div>
        <br>
        <table class="table table-bordered table-striped ">
            <thead>
                <tr>
                    <th>ID User</th>
                    <th>ID Komputer</th>
                    <th>ID Aplikasi</th>
                    <th>Tanggal</th>
                    <th>Jam Awal</th>
                    <th>Jam Akhir</th>

                </tr>
            </thead>
            <tbody>
                
                    <!-- isi tabel -->
                    <?php
                        $stmt;
                        if(isset($_POST["user"])){
                            if($_POST["user"]==null){
                                echo '<script type="text/javascript">alert("Form pencaharian masi kosong");</script>';
                            }
                            else{
                                $sql = 'exec laporanAktifitasUserUS '.$_POST["user"].'';
                                $stmt = sqlsrv_query( $conn,$sql);

                                if($stmt == false){
                                    echo "Error exec.\n";
                                    die(print_r(sqlsrv_errors(), true));
                                }
                                else{
                                   
                                    echo "<tr>";
                                        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                                       
                                            echo "<tr><td>".
                                            $row["FK_User"]."</td><td>".
                                            $row["FK_Komputer"]."</td><td>".
                                            $row["FK_Aplikasi"]."</td><td>".
                                            $row["tanggal"]->format('d-m-Y')."</td><td>".
                                            $row["waktu_mulai"]->format('H:i:s')."</td><td>".
                                            $row["waktu_akhir"]->format('H:i:s')."</td></tr>";
                                        } 
                                    echo "</tr>";
                               
                                }
                            }
                        }else{
                            $sql1 = "exec selectAll 'agr_aktivitas_user'";
                            $stmt1 = sqlsrv_query($conn,$sql1);

                                           while( $row = sqlsrv_fetch_array( $stmt1, SQLSRV_FETCH_ASSOC) ) {
                                                echo "<tr><td>".
                                                $row["FK_User"]."</td><td>".
                                                $row["FK_Komputer"]."</td><td>".
                                                $row["FK_Aplikasi"]."</td><td>".
                                                $row["tanggal"]->format('d-m-Y')."</td><td>".
                                                $row["waktu_mulai"]->format('H:i:s')."</td><td>".
                                                $row["waktu_akhir"]->format('H:i:s')."</td></tr>";
                                            }
                                    
                               
                            
                        }
                        


                    //     while( $row = sqlsrv_fetch_array( $rs, SQLSRV_FETCH_ASSOC) ) {
                    //         echo "<tr><td>".
                    //         $row["FK_User"]."</td><td>".
                    //         $row["FK_Komputer"]."</td><td>".
                    //         $row["FK_Aplikasi"]."</td><td>".
                    //         $row["tanggal"]->format('d-m-Y')."</td><td>".
                    //         $row["waktu_mulai"]->format('H:i:s')."</td><td>".
                    //         $row["waktu_akhir"]->format('H:i:s')."</td></tr>";
                    //     }
                    ?>
                   
                

            </tbody>
        </table>
    </div>

</body>

</html>