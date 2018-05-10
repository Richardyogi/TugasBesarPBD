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
        if(isset($_POST["user"])){
            if($_POST["user"]==null){
                echo '<script type="text/javascript">alert("nama user harus diisi");</script>';
            }
            else{
                $sql1 = "exec insertData 'User','".$_POST["user"]."'";
                echo $sql1;
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

        else if(isset($_POST["app"])){
            if($_POST["app"]==null){
                echo '<script type="text/javascript">alert("nama aplikasi harus diisi");</script>';
            }
            else{
                $sql2 = "exec insertData 'Aplikasi','".$_POST["app"]."'";
                $stmt2 = sqlsrv_query($conn,$sql2);

                if( $stmt2 === false )  
                {  
                    echo "Error in executing.\n";  
                    die( print_r( sqlsrv_errors(), true));  
                }else {
                    echo '<script type="text/javascript">alert("data aplikasi berhasil dimasukkan");</script>';
                }
            }
        }
    }
?>

<body>
    <?php
        include 'header.php';
    ?>
    
    <div id="contentPage">
        <h2>Input Database</h2>
        <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> method="post">
            <div class="form-group">
                <!--TODO: perbaiki seharusnya bukan id pengguna tapi nama pengguna, komputer sama aplikasi juga(ajon)-->
                <label for="user">Nama Pengguna :</label>
                <input type="form" class="form-control" placeholder="Masukan nama Pengguna" name="user">
            </div>
            <button type="submit" class="btn btn-primary">Input</button>
           
        </form>

        <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> method="post">
            <div class="form-group">
                <label for="app">Nama Aplikasi :</label>
                <input type="form" class="form-control" placeholder="Masukan nama Aplikasi" name="app">
            </div>
            <button type="submit" class="btn btn-primary">Input</button>
        </form>
    </div>

</body>

</html>