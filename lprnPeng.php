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
        <h2>Laporan Pengguna</h2>
        <table class="table table-bordered table-striped ">
            <thead>
                <tr>
                    <th>ID User</th>
                    <th>ID Komputer</th>
                    <th>ID Aplikasi</th>
                    <TH>Tanggal</TH>
                    <th>Jam Awal</th>
                    <th>Jam Akhir</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <!-- isi tabel -->
                    <?php
                         $sql = "SELECT * from agr_aktivitas_user";
                         $rs = sqlsrv_query( $conn,$sql);
                         while( $row = sqlsrv_fetch_array( $rs, SQLSRV_FETCH_ASSOC) ) {
                             echo "<tr><td>".
                             $row["FK_User"]."</td><td>".
                             $row["FK_Komputer"]."</td><td>".
                             $row["FK_Aplikasi"]."</td><td>".
                             $row["tanggal"]->format('d-m-Y')."</td><td>".
                             $row["waktu_mulai"]->format('H:i:s')."</td><td>".
                             $row["waktu_akhir"]->format('H:i:s')."</td></tr>";
                         }
                    ?>
                   
                </tr>

            </tbody>
        </table>
    </div>

</body>

</html>