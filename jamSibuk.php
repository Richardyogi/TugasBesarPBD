<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Labkom Report</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-dark  navbar-dark">
        <a class="navbar-brand font-weight-heavy" href="index.html" style="color: #F08519;font-family: Calibri">Labkom
            <a class="navbar-brand" href="index.html" style="color: white;margin-left: -1.1%;margin-right: 1%;font-family: Calibri">Logs</a>
        </a>

        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link " href="input.html">Input data</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="rRobin.html">Round Robin</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    Laporan Lainnya
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="jamSibuk.html">Catatan Jam Sibuk</a>
                    <a class="dropdown-item" href="pengKom.html">Jumlah Penggunaan Komputer</a>
                    <a class="dropdown-item" href="waktuPeng.html">Waktu Penggunaan Komputer</a>
                    <a class="dropdown-item" href="pengApp.html">Penggunaan Aplikasi</a>
                    <a class="dropdown-item" href="lprnPeng.html">Laporan Pengguna</a>
                </div>
            </li>
        </ul>
    </nav>



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
                    <th>Jam</th>
                    <th>Jumlah Pengguna</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <!-- isi tabel -->
                    <td></td>
                    <td></td>

                </tr>

            </tbody>
        </table>
    </div>

</body>

</html>