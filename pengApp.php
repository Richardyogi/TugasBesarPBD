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
        <h2>Daftar Penggunaan Aplikasi</h2>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nama Aplikasi</th>
                    <th>Jumlah Pengguna</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <!-- isi tabel -->
                    <?php
                         $sql = "SELECT * from agr_penggunaan_aplikasi join aplikasi on agr_penggunaan_aplikasi.FK_Aplikasi=id_aplikasi";
                         $rs = sqlsrv_query( $conn,$sql);
                         while( $row = sqlsrv_fetch_array( $rs, SQLSRV_FETCH_ASSOC) ) {
                             echo "<tr><td>".
                             $row["FK_Aplikasi"]."</td><td>".
                             $row["NamaAplikasi"]."</td><td>".
                             $row["jumlah_pengguna"]."</td><td></tr>";
                         }
                    ?>

                </tr>

            </tbody>
        </table>
    </div>

</body>

</html>