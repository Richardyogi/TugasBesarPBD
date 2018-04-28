<?php
    $serverName = "DESKTOP-HKGSIC4\SQLEXPRESS01"; //ubah nama server sesuai di komputer masing"

    // Since UID and PWD are not specified in the $connectionInfo array,
    // The connection will be attempted using Windows Authentication.
    $connectionInfo = array( "Database"=>"master");
    $conn = sqlsrv_connect( $serverName, $connectionInfo);
    
    if( $conn ) {
         echo "Connection established.<br />";
    }else{
         echo "Connection could not be established.<br />";
         die( print_r( sqlsrv_errors(), true));
    }

    // $sql = "SELECT * from aplikasi where id_aplikasi=1";
    // $result = sqlsrv_query( $conn, 
    //                    'select * from aplikasi where id_aplikasi < 10' , 
    //                    array( 5 ));
    
    //                    while($row = sqlsrv_fetch_array($result))
    //                    {
    //                        echo $row['NamaAplikasi'];
                               
                               
    //                         echo "<br>";
    //                    }
?>