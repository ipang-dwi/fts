<?php
	session_start();
	$jml = $_SESSION["jml"];
	$ram = $_SESSION["ram"];
	$num = $_SESSION["num"];
	
	for($i=1;$i<=$jml;$i++){
		$da[$i] = $_POST["input$i"];
	}
	
	// Input User
	echo "Input User <table>";
	echo "<tr><td>Jumlah Data</td><td>: ".$jml."</td></tr>";
	echo "<tr><td>Tahun yang akan diramal</td><td>: ".$ram."</td></tr>";
	echo "<tr><td>Nilai Alpha</td><td>: ".$num."</td></tr>";
	echo "</table>";
	
	
	// Data Aktual
	echo "<br>Data Aktual <table>";
	echo "<tr><th>No.</th><th>Tahun</th><th>Jumlah</th></tr>";
	for($i=1;$i<=$jml;$i++){
		echo "<tr><td>Ft".$i."</td><td>".($ram-($jml-($i-1)))."</td><td>".$da[$i]."</td></tr>";
	}
	echo "</table>";
	
	// Moving Average
	echo "<br>Moving Average <table>";
	echo "<tr><th>No.</th><th>Data Aktual</th><th>Forecast</th></tr>";
	for($i=1;$i<=$jml+1;$i++){
		if($i>=4){ 
			$temp = (($da[$i-3]+$da[$i-2]+$da[$i-1])/3);
			if($i==$jml+1) echo "<tr><td>Ft".$i."</td><td></td><td>".rou($temp)."</td></tr>";
			else echo "<tr><td>Ft".$i."</td><td>".$da[$i]."</td><td>".rou($temp)."</td></tr>";
			$ma[$i] = $temp;
		}
		else
			echo "<tr><td>Ft".$i."</td><td>".$da[$i]."</td><td></td></tr>";
	}
	echo "</table>";
	
	// Exponential Smoothing
	echo "<br>Exponential Smoothing <table>";
	echo "<tr><th>No.</th><th>Data Aktual</th><th>Forecast</th></tr>";
	for($i=1;$i<=$jml+1;$i++){
		if($i>=2){ 
			if($i>=3) $temp = ($da[$i-1]*$num)+((1-$num)*$es[$i-1]);
			else $temp = ($da[$i-1]*$num)+((1-$num)*$da[$i-1]);
			if($i==$jml+1) echo "<tr><td>Ft".$i."</td><td></td><td>".rou($temp)."</td></tr>";
			else echo "<tr><td>Ft".$i."</td><td>".$da[$i]."</td><td>".rou($temp)."</td></tr>";
			$es[$i] = $temp;
		}
		else
			echo "<tr><td>Ft".$i."</td><td>".$da[$i]."</td><td></td></tr>";
	}
	echo "</table>";
	
	// Moving Average ++
	echo "<br>Moving Average ++<table>";
	echo "<tr><th>No.</th><th>Data Aktual</th><th>Forecast</th><th>MAE MA</th><th>MSE MA</th><th>MAPE MA</th></tr>";
	$maema = 0;
	$msema = 0;
	$mapema = 0;
	for($i=1;$i<=$jml+1;$i++){
		if($i>=4){ 
			$temp = (($da[$i-3]+$da[$i-2]+$da[$i-1])/3);
			if($i==$jml+1) echo "<tr><td>Ft".$i."</td><td></td><td>".rou($temp)."</td><td>".rou($maema/($jml-3))."</td><td>".rou($msema/($jml-3))."</td><td>".round(($mapema/($jml-3))*100)."%</td></tr>";
			else {
				$temp2 = $da[$i]-$temp;
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
			echo "<tr><td>Ft".$i."</td><td>".$da[$i]."</td><td></td></tr>";
	}
	echo "</table>";
	
	// Exponential Smoothing ++
	echo "<br>Exponential Smoothing ++<table>";
	echo "<tr><th>No.</th><th>Data Aktual</th><th>Forecast</th><th>MAE ES</th><th>MSE ES</th><th>MAPE ES</th></tr>";
	$maees = 0;
	$msees = 0;
	$mapees = 0;
	for($i=1;$i<=$jml+1;$i++){
		if($i>=2){ 
			if($i>=3) $temp = ($da[$i-1]*$num)+((1-$num)*$es[$i-1]);
			else $temp = ($da[$i-1]*$num)+((1-$num)*$da[$i-1]);
			
			if($i==$jml+1) echo "<tr><td>Ft".$i."</td><td></td><td>".rou($temp)."</td><td>".rou($maees/($jml-1))."</td><td>".rou($msees/($jml-1))."</td><td>".round(($mapees/($jml-1))*100)."%</td></tr>";
			else{ 
				$temp2 = $da[$i]-$temp;
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
			echo "<tr><td>Ft".$i."</td><td>".$da[$i]."</td><td></td></tr>";
	}
	echo "</table>";
	
	echo "<br><i>Maka jumlah calon mahasiswa baru pada STIKOM POLTEK CIREBON pada tahun ".$ram." adalah <b>".round($ma[$jml+1])." dengan metode Moving Average</b>, dan <b>".round($es[$jml+1])." dengan metode Exponential Smoothing</b>.</i>"; 
	echo "<br><br><a href='peramalan.php'><button>Coba lagi..</button></a>";
	
	function cetak($da){
		echo '<pre>';
		print_r($da);
		echo '</pre>';
	}
	
	function rou($da){
		return round($da,2);
	}
?>