<?php
    include 'connection.php';
    include 'phpScript.php';
?>
<?php
    $stmt1;
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(isset($_POST["jumlahUser"])){
            if(empty($_POST["jumlahUser"])){
                echo '<script type="text/javascript">alert("jumlah user harus diisi");</script>';
            }else if( empty($_POST["radioJamMulai"])){
                echo '<script type="text/javascript">alert("waktu mulai harus diisi");</script>';
            }else if(empty($_POST["radioJamMulai"]) || empty($_POST["jumlahUser"])){
                echo '<script type="text/javascript">alert("jumlah user dan waktu mulai harus diisi");</script>';
            }else{
                $sql='declare @n time';
                if($_POST["radioJamMulai"]=="waktuSekarang"){
                    $sql.= ' set @n = convert(time,current_timestamp);';
                    $sql.= ' exec RoundRobinSP '.$_POST["jumlahUser"].', @n;';
                }else if($_POST["radioJamMulai"]=="waktuTerakhir"){
                    $sql.= ' set @n = dbo.cariJamTerakhirDiRoundRobin();';
                    $sql.= ' exec RoundRobinSP '.$_POST["jumlahUser"].', @n;';
                }else{
                    $sql.= ' set @n = null;';
                    $sql.= ' exec RoundRobinSP '.$_POST["jumlahUser"].', "08:00:00"';
                }
                
                $stmt1 = sqlsrv_query($conn, $sql);
                sqlsrv_errors();
                while( $row = sqlsrv_fetch_array( $stmt1, SQLSRV_FETCH_ASSOC) ) {
                    echo $row["pengguna1"];
                }  
                echo '<script type="text/javascript">alert("data random berhasil dimasukkan ke round robin");</script>';
                
            }
        }else if(!isset($_POST["id-user"])||!isset($_POST["id-aplikasi"])||!isset($_POST["id-komputer"])||!isset($_POST["status"])){
            if(empty($_POST["id-user"])){
                echo '<script type="text/javascript">alert("id user harus diisi");</script>';
            }else if(empty($_POST["id-komputer"])){
                echo '<script type="text/javascript">alert("id komputer harus diisi");</script>';
            }else if(empty($_POST["id-aplikasi"])){
                echo '<script type="text/javascript">alert("id aplikasi harus diisi");</script>';
            }else if(empty($_POST["status"]) && $_POST["status"]!=0){
                echo '<script type="text/javascript">alert("status harus diisi");</script>';
            }
        }else{
            $sql = 'exec singleInsertRoundRobin '.$_POST["id-user"].",".$_POST["id-komputer"].",".$_POST["id-aplikasi"].",".$_POST["status"];
            $stmt1 = sqlsrv_query($conn, $sql);
            if( $stmt1 === false )  
            {  
                echo "Error in executing statement 1.\n";  
                die( print_r( sqlsrv_errors(), true));  
            }else{
                echo '<script type="text/javascript">alert("single data berhasil dimasukkan ke round robin");</script>';
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<body>
    <!--TODO: include header di setiap page seperti ini(ajon)-->
   <div class="bg">
   <?php
       // include 'header.php';
    ?>

    <div id="contentPage">
        <h2>Round Robin Table</h2>

        <?php
                        require_once 'paginator_class.php';
                        $limit      = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 1000;
                        $page       = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;
                        $links      = ( isset( $_GET['links'] ) ) ? $_GET['links'] : 7;
                        $start     = ( isset( $_GET['start'] ) ) ? $_GET['start'] : 0;
                        $end         = ( isset( $_GET['end'] ) ) ? $_GET['end'] : 1000;
                        $sql="select * from roundrobin";
                        $Paginator  = new Paginator( $conn, $sql, $start, $end );
                    
                        $results    = $Paginator->getData(  $limit,$page, $start, $end );
                        $sql = "select no_index from index_round_robin";
                        $rs = sqlsrv_query( $conn,$sql);
                        
                        $row = sqlsrv_fetch_array( $rs, SQLSRV_FETCH_ASSOC);
                        $index = $row['no_index']-1;
                        echo "<br>Id Penggunaan terakhir yang diisi pada Tabel Round Robin: ".$index."<br>";
                   ?>
                    
                   

                   <?php echo "<br>".$Paginator->createLinks( $links, 'pagination pagination-sm', $start, $end ); ?> 
        
        <div class="row">
            <div class="table-scroll col-md-8 col-12 mr-5" id="table-scroll">
                <div class="table-wrap">
                    <table class="table main-table table-bordered table-striped " style ="font-size:11px;">
                        <thead class="thead-light" style="">
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
                            
                            <?php for( $i =$start; $i < $end; $i++ ) : ?>
                                        <tr>
                                            <?php
                                                if($results->data[$i]['FK_User']!=null){
                                                    echo "<td>".$results->data[$i]['id_penggunaan']."</td>";
                                                    echo "<td>" .$results->data[$i]['FK_User']."</td>";
                                                    echo "<td>" .$results->data[$i]['FK_Komputer']."</td>";
                                                    echo "<td>" .$results->data[$i]['FK_Aplikasi']."</td>";
                                                    echo "<td>"; echo $results->data[$i]['tanggal']->format('d-m-Y')."</td>";
                                                    echo "<td>"; echo $results->data[$i]['jam']->format('H:i:s')."</td>";
                                                    echo "<td>". $results->data[$i]['status']."</td>";
                                                }else{
                                                    echo "<td>".$results->data[$i]['id_penggunaan']."</td>";
                                                    echo "<td>null</td>";
                                                    echo "<td>null</td>";
                                                    echo "<td>null</td>";
                                                    echo "<td>null</td>";
                                                    echo "<td>null</td>";
                                                    echo "<td>null</td>";
                                                }
                                            ?>                            
                                        </tr>
                                <?php endfor; ?>
                                
                            </tr> 
                        </tbody>
                    </table>
                </div>
            
                <?php echo "<br>".$Paginator->createLinks( $links, 'pagination pagination-sm', $start, $end ); ?> 
                <br>
                                                
            </div>
            
            <div class="offset-1 col-md-3 col-12" style ="max-height:230px;font-size:12px;margin:0;">
                <div class="card bg-light px-3 py-3">
                    <h5>Random Input</h5>
                    Silahkan masukkan banyak data logging oleh user yang diinginkan, data yang masuk akan digerate random
                    secara otomatis:
                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <div class="form-group">
                            <input type="number" class="form-control" name="jumlahUser" id="jumlahUser" min="1" max="25000">
                        </div>
                        <span>Pilih waktu awal generate:</span> <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="radioJamMulai" value="waktuLabBuka">
                            <label class="form-check-label" for="inlineRadio1">waktu lab buka (08:00)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="radioJamMulai" value="waktuSekarang">
                            <label class="form-check-label" for="inlineRadio2">waktu saat ini</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="radioJamMulai" value="waktuTerakhir">
                            <label class="form-check-label" for="inlineRadio2">waktu pengguna terakhir hari ini</label>
                        </div>
                        <br>
                        <br>    
                        <button type="submit" class="btn btn-primary" value="submit">Submit</button>
                    </form>
                </div>
                <br>
                <div class="card bg-light px-3 py-3">
                    <h5>Single Input</h5>
                    Silahkan masukkan data penggunaan aplikasi
                    <br><br>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <div class="form-group">
                            <label for="id-user">ID User</label>
                            <input type="number" class="form-control" name="id-user" id="id-user" min="1">
                            <label for="id-aplikasi">ID Aplikasi</label>
                            <input type="number" class="form-control" name="id-aplikasi" id="id-aplikasi" min="1">
                            <label for="id-komputer">ID Komputer</label>
                            <input type="number" class="form-control" name="id-komputer" id="id-komputer" min="1">
                            status: <br>
                            <label class="radio-inline"><input type="radio" name="status" value="1">start</label>
                            <label class="radio-inline"><input type="radio" name="status" value="0">end</label>
                            
                        </div>
                    
                        <button type="submit" class="btn btn-primary" value="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <br>
       
    </div>
   </div>

</body>

</html>

<script>
    
jQuery(document).ready(function() {
   jQuery(".main-table").clone(true).appendTo('#table-scroll').addClass('clone clones');
   jQuery(".main-table.clone").clone(true).appendTo('#table-scroll').addClass('clone2 clones'); 
 });

</script>
