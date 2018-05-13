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
        <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> method="post">
        <div class="search-container">
            <input type="text" placeholder="Search.." name="user">
            <button type="submit"><i class="fa fa-search"></i></button>
        </div>
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
                <tr>
                    <!-- isi tabel -->
                    <?php
                        $stmt;
                        if(isset($_POST["user"])){
                            if($_POST["user"]==null){
                                echo '<script type="text/javascript">alert("Form pencaharian masi kosong");</script>';
                            }
                            else{
                                $sql = 'exec laporanAktifitasUserUS'.$_POST["user"].'';
                                $stmt = sqlsrv_query( $conn,$sql);

                                if($stmt == false){
                                    echo "Error exec.\n";
                                    die(print_r(sqlsrv_errors(), true));
                                }
                                else{
                                    echo "<table class='table table-bordered table-striped'>";
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>ID User</th>";
                                            echo "<th>ID Komputer</th>";
                                            echo "<th>ID Aplikasi</th>";
                                            echo "<th>Tanggal</th>";
                                            echo "<th>Jam Awal</th>";
                                            echo "<th>Jam Akhir</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    echo "<tr>";
                                        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                                        echo "<tr><td>".
                                            $row["FK_User"]."</td><td>".
                                            $row["FK_Komputer"]."</td><td>".
                                            $row["FK_Aplikasi"]."</td><td>".
                                            $row["tanggal"]."</td></tr>";
                                            $row["waktu_mulai"]."</td><td>".
                                            $row["waktu_akhir"]."</td></tr>";
                                        } 
                                    echo "</tr>";
                                echo "</tbody>";
                                echo "</table>";
                                }
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
                   
                </tr>

            </tbody>
        </table>
    </div>

</body>

</html>