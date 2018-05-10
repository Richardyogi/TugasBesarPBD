<?php
         include 'connection.php';
     
        $sql = "declare @n time set @n = convert(time, current_timestamp)exec RoundRobinSP 10, @n";
        $rs = sqlsrv_query( $conn,$sql);

        if( $rs=== false )  
            {  
                echo "Error in executing statement 1.\n";  
                die( print_r( sqlsrv_errors(), true));  
            }
?>