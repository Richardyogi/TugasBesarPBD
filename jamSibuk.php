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
        <h2>Daftar Jam Sibuk</h2>
        <form action="" id="frmTgl">
            Tanggal
            <input type="date" name="tglCatat">
            <input type="submit">
          </form>
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
                    $sql = "SELECT * from agr_jumlah_pengguna_per_jam";
                    $rs = sqlsrv_query( $conn,$sql);
                    while( $row = sqlsrv_fetch_array( $rs, SQLSRV_FETCH_ASSOC) ) {
                        echo "<tr><td>".$row["Tanggal"]."</td><td>".
                        $row["Start_Time"]."</td><td>".
                        $row["End_time"]."</td><td>".
                        $row["jumlah_pengguna"]."</td></tr>";
                  }
                  
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>