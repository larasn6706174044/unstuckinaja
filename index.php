<?php 

session_start();

// masukkan kode model
require_once 'templates/header.php';
require_once 'model/model.php';

$userData = null;

if ( isset($_SESSION['userData']) ) {

	$userData = $_SESSION['userData'];

}

?>

<!DOCTYPE html>
<html>

<head>
	<title>unStuckInAja! | Today Zero Tomorrow Hero</title>

  <!-- load favicon -->
	<link rel="shortcut icon" type="images/x-icon" href="assets/img/favicon.png">

  <!-- enable responsive -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
  <!-- load font -->
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">

  <!-- load css -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/main.css">

  <!-- load font awesome -->
  <link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet">

  <!-- load bootstrap min js dan jquery -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  
	
	<!-- load ckeditor -->
	<script src="assets/js/ckeditor/ckeditor.js"></script>

</head>

<body>

	<!-- container navigation -->
<div class="wrap-container">

		<!-- navigasi -->
 
		<!--banner-->
		<div class="row row-padding banner-homepage">
			<div class="bg-gradient"></div>
			<div class="container">
				<div class="row row-padding">
					<div class="col-md-7 order-md-1 order-sm-2">
						<h1 class="slogan">
							TODAY ZERO,<br>
							TOMORROW HERO
						</h1>
						<h4>Yang bekerja keras akan mengalahkan yang berbakat ketika yang berbakat tidak bekerja keras.</h4>
					</div>
					<div class="col-md-5 order-md2 order-sm-1">
						<img src="assets/img/laptop.png" class="img-fluid">
					</div>
				</div>
			</div>
		</div>

		<!--main-->
		<div class="container">
			<div class="row row-padding">

				<!--daftar stuck-->
				<div class="col-md-8 mb-4">
					<h4>Top Stuck</h4>

					<?php 
					require_once 'stuck/tampil-daftar-stuck.php';
					display_stuck('top-homepage');
					?>					
				</div>

				<!--sidebar-->
				<div class="offset-md-1 col-md-3">

					<!--stuckButton-->
					<?php 
					
					// logic menampilkan tombol input stuck
					if ( isset ($_SESSION['userNim']) ) {
					?>
						<div class="input-stuck">
							<div class="header rounded-top pt-2 pb-2">
								<h5>
									Lagi Ngestuck?
								</h5>
							</div>
							<div class="content pt-4 pb-4 d-flex justify-content-center">
								<button type="button" class="btn btn-input rounded text-white" name="inputStuck" data-toggle="modal" data-target="#inputStuck">
									<i class="far fa-edit"></i> Kirim Stuck dulu lah
								</button>
							</div>
						</div>

					<?php 
					}
					?>

					<!--top 5 unStucker-->
					<div class="top5">
						<div class="header rounded-top pt-2 pb-2">
							<h5>
								Top 5 unStucker
							</h5>
						</div>
						<div class="content">
								<!--list unStucker-->
								<ol class="ranking-items pl-0">
									
								<li class="row ranking-item m-2 py-2">
									<div class="d-flex justify-content-center col-3 p-0">
										<div class="hb-avatar rounded-circle">
											<a href="#" title="username">
												<img class="avatar-image " src="img/logo.png" alt="username" title="username">
											</a>
										</div>
									</div>
									<div class="row ml-1 pr-2 p-0 col-md-9 col-8">
										<div class="col-md-12 p-0 pl-2">
											<a class="ranking-username" href="#"> Username </a>
										</div>
										<div class="col-4 user-emblem">
											<small><i class="fas fa-trophy"></i> hero</small>
										</div>
										<div class="col-4 user-points">
											<small><i class="fab fa-stack-overflow"></i> 1800</small>
										</div>
										<div class="col-4 user-votes">
											<small><i class="fas fa-star"></i> 180</small>
										</div>
									</div>
								</li>
								<li class="row ranking-item m-2 py-2">
									<div class="d-flex justify-content-center col-3 p-0">
										<div class="hb-avatar rounded-circle">
											<a href="#" title="username">
												<img class="avatar-image " src="img/logo.png" alt="username" title="username">
											</a>
										</div>
									</div>
									<div class="row ml-1 pr-2 p-0 col-md-9 col-8">
										<div class="col-md-12 p-0 pl-2">
											<a class="ranking-username" href="#"> Username </a>
										</div>
										<div class="col-4 user-emblem">
											<small><i class="fas fa-trophy"></i> hero</small>
										</div>
										<div class="col-4 user-points">
											<small><i class="fab fa-stack-overflow"></i> 1800</small>
										</div>
										<div class="col-4 user-votes">
											<small><i class="fas fa-star"></i> 180</small>
										</div>
									</div>
								</li>

								</ol>
						</div>
					</div>
					
				</div>
				
			</div>

		</div>

		<!--modal input stuck-->
		<div class="modal fade" id="inputStuck" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Input Stuck-mu disini! </h5>
						<button type="button" class="close" data-dismiss="modal">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<!-- body modal -->
					<form>
						<div class="modal-body">
							<input type="text" class="form-control" name="judul-stuck" placeholder="Masukkan judul Stuck"><br>
							<textarea class="ckeditor" id="ckedtor" name="isi-stuck"></textarea>
							<br/>
							<select class="custom-select" name="tag-stuck">
									<option selected>Pilih Tag</option>
									<option value="HTML">HTML</option>
									<option value="Javascript">JavaScript</option>
									<option value="Database">Database</option>
								</select>
              
                
						</div>
						<!-- footer modal -->
						<div class="modal-footer">
							<button class="btn">Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<!--footer-->

		<!--footer-->
		<div class="footer">
			<div class="container">

				<!--footer link-->
				<div class="navbar navbar-expand-sm col-md-6 offset-md-3 justify-content-center">
					<ul class="navbar-nav important-color">
						<li>
							<a class="nav-link" href="#">Tentang</a>
						</li>
						<li>
							<a class="nav-link" href="#">Kontak</a>
						</li>
						<li>
							<a class="nav-link">|</a>
						</li>
						<li>
							<a class="nav-link" href="#">Facebook</a>
						</li>
						<li>
							<a class="nav-link" href="#">Twitter</a>
						</li>
					</ul>
				</div>
				<div class="row text-center">
					<div class="col-md-6 offset-md-3 ">
						<p>
							<b class="important-color">unStuckInAja </b>adalah sebuah platform forum tanya jawab pemrograman yang didedikasikan untuk programmer Tel-U dalam
							menyelesaikan problem seputar pemrograman, refernsi tutorial dan lowongan pekerjaan di bidang IT.</p>
						<p class="sign">
							<b class="font-weight-bold">Made with love</b> by
							<b>Humble Bee</b> Copyright 2018.</p>
					</div>
				</div>
			</div>
		</div>
		
	</div> <!--  akhir dari wrapper container -->

</body>

</html>