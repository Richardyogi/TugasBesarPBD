<!DOCTYPE html>
<html lang="en">
<?php
    include 'connection.php';
    include 'phpScript.php';
?>

<body>
    <!--TODO: include header di setiap page seperti ini(ajon)-->
    <?php
        include 'header.php';
    ?>

    <div id="contentPage">
        <h2>Round Robin Table</h2>
        <table class="table table-bordered table-striped">
            <thead class="thead-light">
                <tr>
                    <th>ID Penggunaan</th>
                    <th>ID User</th>
                    <th>ID Komputer</th>
                    <th>ID Aplikasi</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                   <!-- isi tabel -->
                   <!--arlin-28/04-menambahkan loop untuk data rr-->
                   <?php


                        require_once 'paginator_class.php';
                        $limit      = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 50;
                        $page       = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;
                        $links      = ( isset( $_GET['links'] ) ) ? $_GET['links'] : 7;
                        $start     = ( isset( $_GET['start'] ) ) ? $_GET['start'] : 0;
                        $end         = ( isset( $_GET['end'] ) ) ? $_GET['end'] : 50;
                        $sql="select * from roundrobin";
                        $Paginator  = new Paginator( $conn, $sql, $start, $end );
                    
                        $results    = $Paginator->getData(  $limit,$page, $start, $end );
                       
                        
                   ?>
                    <?php echo "<br>".$Paginator->createLinks( $links, 'pagination pagination-sm', $start, $end ); ?> 
                   <?php for( $i =$start; $i < $end; $i++ ) : ?>
                            <tr>
                                <?php
                                    if($results->data[$i]['FK_User']!=null){
                                        echo "<td>".$results->data[$i]['id_penggunaan']."</td>";
                                        echo "<td>" .$results->data[$i]['FK_User']."</td>";
                                        echo "<td>" .$results->data[$i]['FK_Komputer']."</td>";
                                        echo "<td>" .$results->data[$i]['FK_Aplikasi']."</td>";
                                        echo "<td>"; echo $results->data[$i]['tanggal']->format('d-m-Y')."</td>";
                                        echo "<td>"; echo $results->data[$i]['jam']->format('H-i-s')."</td>";
                                        echo "<td>". $results->data[$i]['status']."</td>";
                                    }
                                ?>
                                    
                            </tr>
                    <?php endfor; ?>

                   

                </tr> 
               
            </tbody>
        </table>
    </div>

</body>

</html>