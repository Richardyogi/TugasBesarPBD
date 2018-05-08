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
        <h2>Daftar Jumlah Penggunaan Komputer</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Id Komputer</th>
                    <th>Jumlah Pengguna</th>
                    <th>Durasi (Second) </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <!-- isi tabel -->
                    <?php
                        $sql = "SELECT * from agr_penggunaan_komputer";
                        $rs = sqlsrv_query( $conn,$sql);
                        while( $row = sqlsrv_fetch_array( $rs, SQLSRV_FETCH_ASSOC) ) {
                            echo "<tr><td>".
                            $row["FK_Komputer"]."</td><td>".
                            $row["jumlah_penggunaan"]."</td><td>".
                            $row["durasi"]."</td></tr>";
                        }                        
                    ?>

                </tr>

            </tbody>
        </table>
    </div>

</body>

</html>