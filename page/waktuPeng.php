<!DOCTYPE html>
<html lang="en">
<?php
    include '../phpScript/connection.php';
    include '../phpScript/phpScript.php';
?>

<body>
    <?php 
         include '../layout/header.php';
    ?>

    <div id="contentPage">
        <h2 class="text-center">LAPORAN</h2>
        <hr>
        <H6>Tingkat Penggunaan Komputer 10 Teratas</H6>
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
        <H6>Tingkat Penggunaan Aplikasi 10 Teratas</H6>
        <hr>
        <div class="row">
            <div class="chart-container col-6" >
                <canvas id="chartAplikasi"></canvas>
            </div>
        </div>
        <br>
        <hr>
        <H6>Grafik Aktivitas Jam Sibuk Lab</H6>
        <hr>
        <div class="row">
            
            <div class="chart-container col-6" >
                <canvas id="chartJam"></canvas>
            </div>
            
        </div>
       
    </div>

</body>

</html>
<script>
//penggunaan komputer
var dataKomputer = {
    labels: [
      <?php
          $sql = "exec laporanTop10 'komputer'";
          $rs = sqlsrv_query( $conn,$sql);
          $idKomputer;
          $jumlahPenggunaan;
          $durasi;
          $n=0;
          while( $row = sqlsrv_fetch_array( $rs, SQLSRV_FETCH_ASSOC) ) {
              echo $row["FK_Komputer"].',';
              $idKomputer[$n]=$row["FK_Komputer"];
              $jumlahPenggunaan[$n]=$row["jumlah_penggunaan"];
              $durasi[$n]=$row["durasi"];
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
          },
          ticks: {
                min:1,
                stepSize: 50
            }
      }]
    }
  };
  
  new Chart(document.getElementById("chartKomputer"),{
    type:'bar',
    options: optionsKomputer,
    data: dataKomputer
  });

//durasi komputer
var dataDurasiKomputer = {
    labels: [
      <?php
          for($i=0; $i<sizeof($idKomputer);$i++){
            echo $idKomputer[$i].",";
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
              for($i=0; $i<sizeof($durasi);$i++){
                echo $durasi[$i].",";
              }
            ?>
          
      ],
    }]
};
  
  var optionsDurasiKomputer = {
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
            labelString: "durasi (second)"
          },
          ticks: {
                min:1,
                stepSize: 300000
            }
      }]
    }
  };
  
  new Chart(document.getElementById("chartDurasiKomputer"),{
    type:'bar',
    options: optionsDurasiKomputer,
    data: dataDurasiKomputer
  });

var dataAplikasi = {
  labels: [
      <?php
          $sql = "exec laporanTop10 'aplikasi'";
          $rs = sqlsrv_query( $conn,$sql);
          $n=0;
          while( $row = sqlsrv_fetch_array( $rs, SQLSRV_FETCH_ASSOC) ) {
              echo $row["FK_aplikasi"].',';
              $jumlahPenggunaan[$n]=$row["jumlah_pengguna"];
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
        },
        scaleLabel: {
            display: true,
            labelString: "ID Aplikasi"
          }
      }],
      yAxes: [{
        
        scaleLabel: {
            display: true,
            labelString: "jumlah pengguna"
          },
          ticks: {
                min:1,
                stepSize: 10
            }
      }]
    }
  };
  
  new Chart(document.getElementById("chartAplikasi"),{
    type:'bar',
    options: optionsAplikasi,
    data: dataAplikasi
  });
 

var dataJamSibuk = {
  labels: [
    <?php
          $sql = "SELECT * from dbo.tabelJmlPengguna()";
          $rs = sqlsrv_query( $conn,$sql);
          $n=0;
          while( $row = sqlsrv_fetch_array( $rs, SQLSRV_FETCH_ASSOC) ) {
              echo "'".$row["start_time"]->format('H:i:s')."',";
              $jumlahPenggunaan[$n]=$row["jumlah_pengguna"];
              $n++;
          }
      ?>
  ],
    datasets: [{
      label: "Jam Sibuk (DMY)",
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
    
  var optionsJam = {
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
            labelString: "Jam Pengguna"
          }
      }],
      yAxes: [{
        
        scaleLabel: {
            display: true,
            labelString: "Jumlah pengguna"
          },
          ticks: {
                min:1,
                stepSize: 10
            }
      }]
    }
  };
  new Chart(document.getElementById("chartJam"),{
    type:'line',
    options: optionsJam,
    data: dataJamSibuk
  });

  
</script>           