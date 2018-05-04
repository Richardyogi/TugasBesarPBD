<!DOCTYPE html>
<html lang="en">
<?php
    include 'connection.php';
    include 'phpScript.php';
?>

<?php
    $stmt1;
    $stmt2;
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(!isset($_POST["user"])){
            if($_POST["user"]==null){
                echo '<script type="text/javascript">alert("nama user harus diisi");</script>';
            }
            else{
                $sql1 = 'exec insertUser '.$_POST["user"].'';
                $stmt1 = sqlsrv_query($conn,$sql1);

                if( $stmt1 === false )  
                {  
                    echo "Error in executing.\n";  
                    die( print_r( sqlsrv_errors(), true));  
                }else  {
                    echo '<script type="text/javascript">alert("data user berhasil dimasukkan");</script>';
                }
            }           
        }

        else if(!isset($_POST["app"])){
            if($_POST["app"]==null){
                echo '<script type="text/javascript">alert("nama aplikasi harus diisi");</script>';
            }
            else{
                $sql2 = 'exec insertAplikasi '.$_POST["app"].'';
                $stmt2 = sqlsrv_query($conn,$sql1);

                if( $stmt2 === false )  
                {  
                    echo "Error in executing.\n";  
                    die( print_r( sqlsrv_errors(), true));  
                }else if( $stmt2 === TRUE ) {
                    echo '<script type="text/javascript">alert("data aplikasi berhasil dimasukkan");</script>';
                }
            }
        }
    }
?>

<body>
    <nav class="navbar navbar-expand-sm bg-dark  navbar-dark">
        <a class="navbar-brand font-weight-heavy" href="index.php" style="color: #F08519;font-family: Calibri">Labkom
            <a class="navbar-brand" href="index.php" style="color: white;margin-left: -1.1%;margin-right: 1%;font-family: Calibri">Logs</a>
        </a>

        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link " href="input.php">Input data</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="rRobin.php">Round Robin</a>
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


    
    <div id="contentPage">
        <h2>Input Database</h2>
        <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> method="post">
            <div class="form-group">
                <!--TODO: perbaiki seharusnya bukan id pengguna tapi nama pengguna, komputer sama aplikasi juga(ajon)-->
                <label for="user">Nama Pengguna :</label>
                <input type="form" class="form-control" placeholder="Masukan nama Pengguna" name="user">
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