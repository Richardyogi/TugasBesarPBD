
<!DOCTYPE html>
<html lang="en">
<?php
    include '../phpScript/connection.php';
    include '../phpScript/phpScript.php';

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $sql= "exec InsertIntoAgregat ";
        $stmt1 = sqlsrv_query($conn, $sql);
        while( $row = sqlsrv_fetch_array( $stmt1, SQLSRV_FETCH_ASSOC) ) {
            echo "";
        }  
        echo '<script type="text/javascript">alert("agregat jam 24:00 selesai");</script>';
    }
?>

<body>
    <?php
        include '../layout/header.php';
    ?>

    <center>
        <div id="contentPage">
            <h2>Agregasi Malam</h2>
            <br>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <button type="submit" class="btn btn-primary">Tombol Agregasi</button>
            </form>
        </div>
    </center>
</body>

</html>

