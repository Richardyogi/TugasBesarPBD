<!DOCTYPE html>
<html lang="en">
<?php
    
    include 'connection.php';
    include 'phpScript.php';
?>

<body>
    <!--TODO: benarkan background di setiap page,
    berikan div dengan class bg untuk membungkus semua konten di page
    termasuk header(ajon)-->
    <div class="bg">
        <nav class="navbar navbar-expand-sm bg-dark  navbar-dark">
            <a class="navbar-brand font-weight-heavy" href="index.php" style="color: #F08519;font-family: Calibri">Labkom
                <a class="navbar-brand" href="index.php" style="color: white;margin-left: -1.1%;margin-right: 1%;font-family: Calibri">Logs</a>
            </a>

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link " href="input.php">Input data</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="Rrobin.php">Round Robin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="agregasi.html">Agregasi</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        Laporan Lainnya
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="jamSibuk.php">Catatan Jam Sibuk</a>
                        <a class="dropdown-item" href="pengKom.php">Jumlah Penggunaan Komputer</a>
                        <a class="dropdown-item" href="waktuPeng.php">Waktu Penggunaan Komputer</a>
                        <a class="dropdown-item" href="pengApp.php">Penggunaan Aplikasi</a>
                        <a class="dropdown-item" href="lprnPeng.php">Laporan Pengguna</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div>
            <center>
                <p style="margin-top: 22.5%">
                    <span class="font-weight-light" id="welcome">SELAMAT DATANG</span>
                </p>
            </center>
        </div>
    </div>
</body>

</html>s