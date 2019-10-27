<?php 
	session_start();
	include 'config.php';
	$_SESSION["jml"]=$_POST["jumlah"];
	$_SESSION["ram"]=$_POST["ramal"];
	$_SESSION["num"]=$_POST["number"];
	$_SESSION["posisi"] = "input.php";
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
        <li class="nav-item">
          <a class="nav-link active" href="peramalan.php">Peramalan <span class="sr-only">(current)</span></a>
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
	<form method="post" action="output.php">
		<?php for($i=0;$i<$_SESSION["jml"];$i++){ ?>
			<div class="form-group">
				<label for="input<?php echo $i+1;?>">Ft<?php echo $i+1;?> - Tahun <?php echo $_SESSION["ram"]-($_SESSION["jml"]-$i)?> : </label>
				<input type="number" class="form-control" name="input<?php echo $i+1;?>" id="input<?php echo $i+1;?>" placeholder="" min="1" step="1">
			</div>
		<?php } ?>
		<div class="form-group">
			<button type="submit" class="btn btn-primary">Lanjutkan Proses</button>
		</div>
	</form>
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
