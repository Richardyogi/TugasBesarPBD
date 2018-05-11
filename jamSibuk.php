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
                  if($_SERVER["REQUEST_METHOD"]=="POST"){
                      echo "some";  
                        if(isset($_POST["tglCatat"])){
                            if($_POST["tglCatat"]==null){
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
                        $sql = "exec selectAll 'agr_jumlah_pengguna_per_jam'";
                        $rs = sqlsrv_query( $conn,$sql);
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