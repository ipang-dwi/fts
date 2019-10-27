<?php 
	session_start();
	include 'config.php';
	$jml = $_SESSION["jml"];
	$ram = $_SESSION["ram"];
	$num = $_SESSION["num"];
	$_SESSION["posisi"] = "output.php";
?>
<!DOCTYPE html>
<!-- saved from url=(0064)https://getbootstrap.com/docs/4.3/examples/sticky-footer-navbar/ -->
<html lang="en" class="h-100"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title><?php echo $_SESSION["judul"]." - ".$_SESSION["creator"];?></title>

    <!--link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/sticky-footer-navbar/"-->

    <!-- Bootstrap core CSS -->
<link href="ui/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link href="ui/css/<?php 
if(!isset($_SESSION['theme'])) echo "united";
else echo $_SESSION['theme'];?>.css" rel="stylesheet">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="./index_files/sticky-footer-navbar.css" rel="stylesheet">
  </head>
  <body class="d-flex flex-column h-100">
    <header>
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md fixed-top navbar-dark bg-primary">
    <a class="navbar-brand" href="index.php"><?php echo $_SESSION["judul"];?></a>
    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse" id="navbarCollapse" style="">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Beranda <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="peramalan.php">Peramalan <span class="sr-only">(current)</span></a>
        </li>
		 <li class="nav-item">
          <a class="nav-link" href="profile.php">Profile <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Tema</a>
		  </li>
      </ul>
     
    </div>
  </nav>
</header>

<!-- Begin page content -->
<main role="main" class="flex-shrink-0">
  <div class="container">
    <br><br><br><br>
	<?php
	for($i=1;$i<=$jml;$i++){
		$da[$i] = $_POST["input$i"];
	}
	
	// Input User
	echo "<b>Input User</b> <table>";
	echo "<tr><td>Jumlah Data</td><td>: ".$jml."</td></tr>";
	echo "<tr><td>Tahun yang akan diramal</td><td>: ".$ram."</td></tr>";
	echo "<tr><td>Nilai Alpha</td><td>: ".$num."</td></tr>";
	echo "</table>";
	
	
	// Data Aktual
	echo "<br><b>Data Aktual</b> <div class='table-responsive'><table class='table  table-striped table-bordered table-hover table-sm'>";
	echo "<tr><th>No.</th><th>Tahun</th><th>Jumlah</th></tr>";
	for($i=1;$i<=$jml;$i++){
		echo "<tr><td>Ft".$i."</td><td>".($ram-($jml-($i-1)))."</td><td>".$da[$i]."</td></tr>";
	}
	echo "</table></div>";
	
	// Moving Average ++
	echo "<br><b>Forecasting dengan Moving Average</b> <div class='table-responsive'><table class='table  table-striped table-bordered table-hover table-sm'>";
	echo "<tr><th>No.</th><th>Data Aktual</th><th>Forecast</th><th>MAD MA</th><th>MSE MA</th><th>MAPE MA</th></tr>";
	$maema = 0;
	$msema = 0;
	$mapema = 0;
	for($i=1;$i<=$jml+1;$i++){
		if($i>=4){ 
			$temp = (($da[$i-3]+$da[$i-2]+$da[$i-1])/3);
			if($i==$jml+1) echo "<tr><td>Ft".$i."</td><td></td><td>".rou($temp)."</td><td>Rata-rata : ".rou($maema/($jml-3))."</td><td>Rata-rata : ".rou($msema/($jml-3))."</td><td>Rata-rata : ".round(($mapema/($jml-3))*100)."%</td></tr>";
			else {
				$temp2 = abs($da[$i]-$temp);
				$temp3 = pow($temp2,2);
				$temp4 = abs($temp2)/$da[$i];
				echo "<tr><td>Ft".$i."</td><td>".$da[$i]."</td><td>".rou($temp)."</td><td>".rou($temp2)."</td><td>".rou($temp3)."</td><td>".round($temp4*100)."%</td></tr>";
			}
			$ma[$i] = $temp;
			$maema = $maema + $temp2;
			$msema = $msema + $temp3;
			$mapema = $mapema + $temp4;
		}
		else
			echo "<tr><td>Ft".$i."</td><td>".$da[$i]."</td><td></td><td></td><td></td><td></td></tr>";
	}
	echo "</table></div>";
	
	// Exponential Smoothing ++
	echo "<br><b>Forecasting dengan Exponential Smoothing</b> <div class='table-responsive'><table class='table  table-striped table-bordered table-hover table-sm'>";
	echo "<tr><th>No.</th><th>Data Aktual</th><th>Forecast</th><th>MAD ES</th><th>MSE ES</th><th>MAPE ES</th></tr>";
	$maees = 0;
	$msees = 0;
	$mapees = 0;
	for($i=1;$i<=$jml+1;$i++){
		if($i>=2){ 
			if($i>=3) $temp = ($da[$i-1]*$num)+((1-$num)*$es[$i-1]);
			else $temp = ($da[$i-1]*$num)+((1-$num)*$da[$i-1]);
			
			if($i==$jml+1) echo "<tr><td>Ft".$i."</td><td></td><td>".rou($temp)."</td><td>Rata-rata : ".rou($maees/($jml-1))."</td><td>Rata-rata : ".rou($msees/($jml-1))."</td><td>Rata-rata : ".round(($mapees/($jml-1))*100)."%</td></tr>";
			else{ 
				$temp2 = abs($da[$i]-$temp);
				$temp3 = pow($temp2,2);
				$temp4 = abs($temp2)/$da[$i];
				echo "<tr><td>Ft".$i."</td><td>".$da[$i]."</td><td>".rou($temp)."</td><td>".rou($temp2)."</td><td>".rou($temp3)."</td><td>".round($temp4*100)."%</td></tr>";
			}
			$es[$i] = $temp;
			$maees = $maees + $temp2;
			$msees = $msees + $temp3;
			$mapees = $mapees + $temp4;
		}
		else
			echo "<tr><td>Ft".$i."</td><td>".$da[$i]."</td><td></td><td></td><td></td><td></td></tr>";
	}
	echo "</table></div>";
	
	echo "<br><i>Maka jumlah calon mahasiswa baru pada STIKOM POLTEK CIREBON pada tahun ".$ram." adalah <b>".round($ma[$jml+1])." dengan metode Moving Average</b>, dan <b>".round($es[$jml+1])." dengan metode Exponential Smoothing</b>.</i>"; 
	echo "<br><br><a href='peramalan.php' class='btn btn-primary'>Coba lagi..</a>";
	?>
  </div>
</main>

<footer class="footer mt-auto py-3">
  <div class="container">
    <span class="text-muted"><?php echo $_SESSION["judul"]." versi ".$_SESSION["versi"]." - ".$_SESSION["creator"]." &copy ".date("Y");?></span>
  </div>
</footer>
<script src="ui/js/jquery-3.3.1.slim.min.js.download" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="ui/js/bootstrap.bundle.min.js.download" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>

</body></html>

<?php	
	function cetak($da){
		echo '<pre>';
		print_r($da);
		echo '</pre>';
	}
	
	function rou($da){
		return round($da,2);
	}
?>