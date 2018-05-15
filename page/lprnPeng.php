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
        <h2>Laporan Logging Pengguna</h2>

        <br>
        <span>Silahkan cari logging yang diinginkan</span>
        <form  class ="row" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> method="post">
        <div class="form-group col-4">
            <label for="email">ID User:</label>
            <input type="number" class="form-control" placeholder="Masukkan ID User" name="user"><br>
        </div>
        <div class="form-group col-4">
            <label for="email">ID Komputer:</label>
            <input type="number" class="form-control" placeholder="ID Komputer" name="komputer"><br>
        </div>
        <div class="form-group col-4">
            <label for="email">ID Aplikasi:</label>
            <input type="number" class="form-control" placeholder="ID Aplikasi" name="aplikasi"><br>
        </div>
        <div class="form-group col-4">
            <label for="email">Tanggal:</label>
            <input type="date" class="form-control" placeholder="Tanggal" name="tanggal"><br>
        </div>
        <div class="form-group col-4">
            <label for="email">Waktu:</label>
            <input type="time"  class="form-control" placeholder="Jam" name="jam">
        </div>

            <button type="submit" class="btn btn-primary" style="height:40px;margin-top:32px;"><i class="fa fa-search"></i> Search</button>
        

     
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
                            if($_POST["user"]==null && $_POST["komputer"]==null && $_POST["aplikasi"]==null && $_POST["tanggal"]==null && $_POST["jam"]==null){
                                echo '<script type="text/javascript">alert("Form pencarian harus diisi!!");</script>';
                            }
                            else{
                                $sql =  'exec laporanAktifitasUser ';
                                    if($_POST["user"]!=null){
                                        $sql .= $_POST["user"].",";
                                    }else{
                                        $sql .="null,";
                                    }

                                    if($_POST["komputer"]!=null){
                                        $sql .= $_POST["komputer"].",";
                                    }else{
                                        $sql .="null,";
                                    }

                                    if($_POST["aplikasi"]!=null){
                                        $sql .= $_POST["aplikasi"].",";
                                    }else{
                                        $sql .="null,";
                                    }

                                    if($_POST["tanggal"]!=null){
                                        $sql .= $_POST["tanggal"].",";
                                    }else{
                                        $sql .="null,";
                                    }

                                    if($_POST["jam"]!=null){
                                        $sql .= $_POST["jam"].",";
                                    }else{
                                        $sql .="null,";
                                    }
                                   
                                $sql = substr($sql,0,strlen($sql)-1);
                                
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