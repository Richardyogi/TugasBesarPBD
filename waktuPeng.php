<!DOCTYPE html>
<html lang="en">
<?php
    include 'connection.php';
    include 'phpScript.php';
?>

<body>
    <?php 
        include 'header.php';
    ?>

    <div id="contentPage">
        <h2 class="text-center">LAPORAN</h2>
        <hr>
        <H6>Tingkat Penggunaan Komputer</H6>
        <hr>
        <div class="row">
            <div class="chart-container col-6" >
                <canvas id="chartKomputer"></canvas>
            </div>
            <div class="chart-container col-6" >
                <canvas id="chartDurasiKomputer"></canvas>
            </div>
        </div>
        <br>
        <hr>
        <H6>Tingkat Penggunaan Aplikasi</H6>
        <hr>
        <div class="row">
            <div class="chart-container col-6" >
                <canvas id="chartAplikasi"></canvas>
            </div>
        </div>
        <br>
        <hr>
        <H6>Tingkat Aktivitas User</H6>
        <hr>
        <div class="row">
            
            <div class="chart-container col-6" >
                <canvas id="chartUser"></canvas>
            </div>
            
        </div>
        
    
    </div>

</body>

</html>
<script>
var dataKomputer = {
    labels: [
      <?php
          $sql = "exec laporanJumlahPenggunaanKomputerTop5";
          $rs = sqlsrv_query( $conn,$sql);
          $jumlahPenggunaan;
          $n=0;
          while( $row = sqlsrv_fetch_array( $rs, SQLSRV_FETCH_ASSOC) ) {
              echo $row["FK_Komputer"].',';
              $jumlahPenggunaan[$n]=$row["jumlah_penggunaan"];
              $n++;
          }
      ?>
    ],
    datasets: [{
      label: "jumlah pengguna",
      backgroundColor: "rgba(255,99,132,0.2)",
      borderColor: "rgba(255,99,132,1)",
      borderWidth: 1,
      hoverBackgroundColor: "rgba(255,99,132,0.4)",
      hoverBorderColor: "rgba(255,99,132,1)",
      data: [
          <?php
              for($i=0; $i<sizeof($jumlahPenggunaan);$i++){
                echo $jumlahPenggunaan[$i].",";
              }
            ?>
          
      ],
    }]
  };
  
  var optionsKomputer = {
    maintainAspectRatio: true,
    scales: {
      yAxes: [{
        stacked: true,
        gridLines: {
          display: true,
          color: "rgba(255,99,132,0.2)"
        }
      }],
      xAxes: [{
        gridLines: {
          display: false
        },
        scaleLabel: {
            display: true,
            labelString: "ID Komputer"
          }
      }],
      yAxes: [{
        
        scaleLabel: {
            display: true,
            labelString: "jumlah pengguna"
          }
      }]
    }
  };
  new Chart(document.getElementById("chartKomputer"),{
    type:'bar',
    options: optionsKomputer,
    data: dataKomputer
  });

  var dataAplikasi = {
    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
    datasets: [{
      label: "Data 5 Aplikasi dengan Jumlah Pemakaian Tertinggi",
      backgroundColor: "rgba(255,99,132,0.2)",
      borderColor: "rgba(255,99,132,1)",
      borderWidth: 1,
      hoverBackgroundColor: "rgba(255,99,132,0.4)",
      hoverBorderColor: "rgba(255,99,132,1)",
      data: [65, 59, 20, 81, 56, 55, 40],
    }]
  };
  
  var optionsAplikasi = {
    maintainAspectRatio: true,
    scales: {
      yAxes: [{
        stacked: true,
        gridLines: {
          display: true,
          color: "rgba(255,99,132,0.2)"
        }
      }],
      xAxes: [{
        gridLines: {
          display: false
        }
      }]
    }
  };
  
  Chart.Bar('chartAplikasi', {
    options: optionsAplikasi,
    data: dataAplikasi
  });

  var dataUser = {
    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
    datasets: [{
      label: "Data 5 User Paling Aktif",
      backgroundColor: "rgba(255,99,132,0.2)",
      borderColor: "rgba(255,99,132,1)",
      borderWidth: 1,
      hoverBackgroundColor: "rgba(255,99,132,0.4)",
      hoverBorderColor: "rgba(255,99,132,1)",
      data: [65, 59, 20, 81, 56, 55, 40],
    }]
  };
  
  var optionsUser = {
    maintainAspectRatio: true,
    scales: {
      yAxes: [{
        stacked: true,
        gridLines: {
          display: true,
          color: "rgba(255,99,132,0.2)"
        }
      }],
      xAxes: [{
        gridLines: {
          display: false
        }
      }]
    }
  };
  
  Chart.Bar('chartUser', {
    options: optionsUser,
    data: dataUser
  });
  
  
  
</script>