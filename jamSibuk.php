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
        <h2>Jam Sibuk</h2>
        <br>
        <span>Pilih tanggal yang ingin dilihat:</span>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            Tanggal
            <input type="date" name="tglCatat">
            <input type="submit" class="btn btn-primary">
          </form>
        <br>
        
        <h6>Tabel Catatan Pengguna di Range 1 Jam</h6>
        <table class="table table-bordered">
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
                  if($_SERVER["REQUEST_METHOD"]=="POST"){
                      echo "some";  
                        if(isset($_POST['tglCatat'])){
                            if(empty($_POST['tglCatat'])){
                                echo '<script type="text/javascript">alert("pilihan tanggal harus diisi");</script>';
                            }else{
                                $sql = "select dbo.lihatPenggunaanPadaTanggalTertentu(". $_POST['tglCatat'].")";
                                echo $sql;
                                $rs = sqlsrv_query( $conn,$sql);
                                while( $row = sqlsrv_fetch_array( $rs, SQLSRV_FETCH_ASSOC) ) {
                                    echo "<tr><td>".$row["tanggal"]->format('d-m-Y')."</td><td>".
                                    $row["start_time"]->format('H:i:s')."</td><td>".
                                    $row["end_time"]->format('H:i:s')."</td><td>".
                                    $row["jumlah_pengguna"]."</td></tr>";
                                }
                            }
                        }
                    }else{
                        $sql = "SELECT * from agr_jumlah_pengguna_per_jam";
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