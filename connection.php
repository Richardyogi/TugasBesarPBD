<?php
    $serverName = "AUDITAMAPI-PC\SQLEXPRESS"; //ubah nama server sesuai di komputer masing"
    
    //server ajon AUDITAMAPI-PC\SQLEXPRESS
    //server icad DESKTOP-HKGSIC4\SQLEXPRESS01
    
    
    // Since UID and PWD are not specified in the $connectionInfo array,
    // The connection will be attempted using Windows Authentication.
    $connectionInfo = array( "Database"=>"master");
    $conn = sqlsrv_connect( $serverName, $connectionInfo);
    
    if( $conn ) {
         //echo "Connection established.<br />";
    }else{
         echo "Connection could not be established.<br />";
         die( print_r( sqlsrv_errors(), true));
    }
?>