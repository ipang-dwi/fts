<?php 
	session_start();
	include 'config.php';
	$_SESSION["posisi"] = "peramalan.php";
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
			<div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 40px, 0px);">
			  <a class="dropdown-item" href="cek.php?id=1">Cerulean</a>
			  <a class="dropdown-item" href="cek.php?id=2">Cosmo</a>
			  <a class="dropdown-item" href="cek.php?id=3">Cyborg</a>
			  <a class="dropdown-item" href="cek.php?id=4">Darkly</a>
			  <a class="dropdown-item" href="cek.php?id=5">Flatly</a>
			  <a class="dropdown-item" href="cek.php?id=6">Journal</a>
			  <a class="dropdown-item" href="cek.php?id=7">Litera</a>
			  <a class="dropdown-item" href="cek.php?id=8">Lumen</a>
			  <a class="dropdown-item" href="cek.php?id=9">Lux</a>
			  <a class="dropdown-item" href="cek.php?id=10">Materia</a>
			  <a class="dropdown-item" href="cek.php?id=11">Minty</a>
			  <a class="dropdown-item" href="cek.php?id=12">Pulse</a>
			  <a class="dropdown-item" href="cek.php?id=13">Sandstone</a>
			  <a class="dropdown-item" href="cek.php?id=14">Simplex</a>
			  <a class="dropdown-item" href="cek.php?id=15">Sketchy</a>
			  <a class="dropdown-item" href="cek.php?id=16">Slate</a>
			  <a class="dropdown-item" href="cek.php?id=17">Solar</a>
			  <a class="dropdown-item" href="cek.php?id=18">Spacelab</a>
			  <a class="dropdown-item" href="cek.php?id=19">Superhero</a>
			  <a class="dropdown-item" href="cek.php?id=20">United</a>
			  <a class="dropdown-item" href="cek.php?id=21">Yeti</a>
			</div>
		  </li>
      </ul>
     
    </div>
  </nav>
</header>

<!-- Begin page content -->
<main role="main" class="flex-shrink-0">
  <div class="container">
    <br><br><br><br>
	<form method="post" action="input.php">
		<div class="form-group">
			<label for="jumlah">Jumlah Data</label>
			<select class="form-control" id="jumlah" name="jumlah">
			  <option value="4">4</option>
			  <option value="5">5</option>
			  <option value="6">6</option>
			  <option value="7">7</option>
			  <option value="8">8</option>
			  <option value="9">9</option>
			  <option value="10">10</option>
			  <option value="11">11</option>
			  <option value="12">12</option>
			  <option value="13">13</option>
			  <option value="14">14</option>
			  <option value="15">15</option>
			  <option value="16">16</option>
			  <option value="17">17</option>
			  <option value="18">18</option>
			  <option value="19">19</option>
			  <option value="20">20</option>
			  <option value="21">21</option>
			  <option value="22">22</option>
			  <option value="23">23</option>
			  <option value="24">24</option>
			  <option value="25">25</option>
			  <option value="26">26</option>
			  <option value="27">27</option>
			  <option value="28">28</option>
			  <option value="29">29</option>
			  <option value="30">30</option>
			</select>
		</div>
		<div class="form-group">
			<label for="ramal">Tahun yang akan diramal</label>
			<input type="number" class="form-control" name="ramal" id="ramal" placeholder="" min="2020" value="2020">
		</div>
		<div class="form-group">
			<label for="alpha">Nilai Alpha</label>
			<select class="form-control" id="number" name="number">
			  <option value="0.1">0.1</option>
			  <option value="0.2">0.2</option>
			  <option value="0.3">0.3</option>
			  <option value="0.4">0.4</option>
			  <option value="0.5">0.5</option>
			  <option value="0.6">0.6</option>
			  <option value="0.7">0.7</option>
			  <option value="0.8">0.8</option>
			  <option value="0.9">0.9</option>
			</select>
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary">Proses</button>
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