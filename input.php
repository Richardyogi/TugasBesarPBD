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
    <link rel="stylesheet" href="../../assets/css/main.css">
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-dark  navbar-dark">
        <a class="navbar-brand font-weight-heavy" href="index.html" style="color: #F08519;font-family: Calibri">Labkom
            <a class="navbar-brand" href="index.html" style="color: white;margin-left: -1.1%;margin-right: 1%;font-family: Calibri">Logs</a>
        </a>

        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link " href="#">Input data</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="#">Round Robin</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    Laporan Lainnya
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Catatan Jam Sibuk</a>
                    <a class="dropdown-item" href="#">Penggunaan Komputer</a>
                    <a class="dropdown-item" href="#">Waktu Penggunaan Komputer</a>
                    <a class="dropdown-item" href="#">Penggunaan Aplikasi</a>
                    <a class="dropdown-item" href="#">Laporan Pengguna</a>
                </div>
            </li>
        </ul>
    </nav>



    <div id="inputPage">
        <h2>Input Database</h2>
        <form action="/action_page.php">
            <div class="form-group">
                <label for="user">Nama Pengguna :</label>
                <input type="form" class="form-control" placeholder="Masukan nama Pengguna" name="user">
            </div>
            <button type="submit" class="btn btn-primary">Input</button>
            <div class="form-group">
                <label for="computer">Nama Komputer :</label>
                <input type="form" class="form-control" placeholder="Masukan nama Komputer" name="computer">
            </div>
            <button type="submit" class="btn btn-primary">Input</button>
            <div class="form-group">
                    <label for="app">Nama Aplikasi :</label>
                    <input type="form" class="form-control" placeholder="Masukan nama Aplikasi" name="app">
                </div>
                <button type="submit" class="btn btn-primary">Input</button>
        </form>
    </div>

</body>

</html>