<!DOCTYPE html>
<html lang="en">
<?php
    
    include ('phpScript/connection.php');
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Labkom Report</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <!--TODO: benarkan background di setiap page,
    berikan div dengan class bg untuk membungkus semua konten di page
    termasuk header(ajon)-->
    <div class="bg">
    <nav class="navbar navbar-expand-sm bg-dark  navbar-dark">
        <a class="navbar-brand font-weight-heavy" href="index.php" style="color: #F08519;font-family: Calibri">Labkom
            <span style="color: white;margin-left: -1.1%;margin-right: 1%;font-family: Calibri">Logs</span>
        </a>

        <ul class="navbar-nav ">
            <li class="nav-item ">
                <a class="nav-link " href="page/input.php">Input data</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="page/rRobin.php">Round Robin</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="page/agregasi.php">Agregasi</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                   Tabel dan Laporan Lainnya
                </a>
                <div class="dropdown-menu">
                        <a class="dropdown-item" href="page/jamSibuk.php">Tabel Jumlah Pengguna Per Jam</a>
                        <a class="dropdown-item" href="page/pengKom.php">Tabel Penggunaan Komputer</a>
                        <a class="dropdown-item" href="page/pengApp.php">Tabel Aplikasi</a>
                        <a class="dropdown-item" href="page/lprnPeng.php">Tabel Logging Pengguna</a>
                        <a class="dropdown-item" href="page/waktuPeng.php">Laporan Keseluruhan</a>
                        
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

</html>