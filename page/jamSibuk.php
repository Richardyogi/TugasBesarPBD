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
        <h2>Tabel Catatan Pengguna di Range 1 Jam</h2>

        <span>cari berdasarkan tanggal dan kisaran waktu yang diinginkan (salah satu boleh dikosongkan):</span><br>
        <form  class="row" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> method="post">
            
                <div class="form-group col-4">
                    <input type="date" class="form-control" placeholder="Masukkan tanggal" name="tglCatat"><br>
                </div>
                <div class="form-group col-4">
                    <input type="time" class="form-control" placeholder="Masukkan jam" name="jamCatat"><br>
                </div>
       
                <br>
                    <button type="submit"class="btn btn-primary" style="max-height:35px;">Search <i class="fa fa-search"></i></button>
        
        </form>
        <br>
        <div class="row">
        <table class="table table-bordered table-striped  offset-2 col-8 ">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Jumlah Penggunaan</th>
                </tr>
            </thead>
        </div>
            <tbody>
                <?php 
               
                $stmt;
                $stmt1;
                    if($_SERVER["REQUEST_METHOD"]=="POST"){
                        
                        // echo $_POST["tglCatat"];
                        // echo $_POST["jamCatat"];

                        if(isset($_POST["tglCatat"]) && isset($_POST["jamCatat"])){
                            if($_POST["tglCatat"]==null && $_POST["jamCatat"]==null){
                                echo '<script type="text/javascript">alert("Salah satu form harus diisi terlebih dahulu!");</script>';
                            }
                            else{
                                if($_POST["tglCatat"]!=null && $_POST["jamCatat"]==null){
                                    $sql = "exec daftarPenggunaPerjam '".$_POST["tglCatat"]."',null";
                                }else if($_POST["jamCatat"]!=null && $_POST["tglCatat"]==null){
                                    $sql = "exec daftarPenggunaPerjam null,'".$_POST["jamCatat"]."'";
                                }else if($_POST["jamCatat"]!=null && $_POST["tglCatat"]!=null){
                                    $sql = "exec daftarPenggunaPerjam '".$_POST["tglCatat"]."','".$_POST["jamCatat"]."'";
                                }
                                echo $sql;
                                $stmt = sqlsrv_query($conn,$sql);
                            
                                if($stmt == false){
                                    echo "Error exec.\n";
                                    die(print_r(sqlsrv_errors(),true));
                                }
                                else{    
                                            while( $row = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){
                                            echo "<tr><td>".
                                             $row["tanggal"]->format('d-m-Y')."</td><td>".
                                             $row["start_time"]->format('H:i:s')."</td><td>". 
                                             $row["end_time"]->format('H:i:s')."</td><td>".
                                             $row["jumlah_pengguna"]."</td></tr>";
                                          }
                                }
                            }
                        }
                    }else{
                        $sql = "exec selectAll 'agr_jumlah_pengguna_per_jam'";
                        $rs = sqlsrv_query( $conn,$sql);
                        while( $row = sqlsrv_fetch_array( $rs, SQLSRV_FETCH_ASSOC) ) {
                            echo "<tr><td>".$row["tanggal"]->format('d-m-Y')."</td><td>".
                            $row["start_time"]->format('H:i:s')."</td><td>".
                            $row["end_time"]->format('H:i:s')."</td><td>".
                            $row["jumlah_pengguna"]."</td></tr>";
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>