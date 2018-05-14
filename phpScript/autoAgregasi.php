<?php
         include 'connection.php';
     
        $sql = "exec insertIntoAgregat";
        $rs = sqlsrv_query( $conn,$sql);

        if( $rs=== false )  
            {  
                echo "Error in executing statement 1.\n";  
                die( print_r( sqlsrv_errors(), true));  
            }
?>
<!---jjkjhkjh->