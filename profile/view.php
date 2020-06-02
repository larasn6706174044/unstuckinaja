<?php

// include kan kode auth
require_once('../auth.php');

// jika user belum login, maka paksa login
require_once 'controller/proses-profile.php';
require_once 'controller/get-emblems.php';


$nim = $rowUser['user_login'];

// ambil nilai return dari function proses profile
$rowUser = getProfile();

// simpan data user ke session
// session ini digunakan untuk menampilkan data user ke profile dan edit profile
$_SESSION['userData'] = [
	'nim' => $rowUser['nim'],
	'username' => $rowUser['username'],
	'nama' => $rowUser['nama'],
	'photo' => $rowUser['photo'],
	'motto' => nl2br($rowUser['motto']),
	'bio' => nl2br($rowUser['bio']),
	'email' => $rowUser['email'],
	'twitter' => $rowUser['twitter'],
	'github' => $rowUser['github'],
	'siteUrl' => $rowUser['siteUrl']
];

?>

<!DOCTYPE html>

<html>

<head>

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="ie=edge">


<title>
	<?= $rowUser['username'] ?> | unStuckInAja!
</title>

<!-- load favicon -->
<link rel="shortcut icon" type="images/x-icon" href="../assets/img/favicon.png">

<!-- enable responsive -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- load font -->
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">

<!-- load css -->
<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
<link rel="stylesheet" href="../assets/css/main.css">

<!-- load font awesome -->
<link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet">

<!-- load bootstrap min js dan jquery -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  

<!-- load confirm js -->
<link rel="stylesheet" href="../assets/css/jquery-confirm.min.css">
<script src="../assets/js/jquery-confirm.min.js"></script>

<!-- load font awesome -->
<link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">	

<!-- load ckeditor -->
<script src="../assets/js/ckeditor/ckeditor.js"></script>

</head>

<body>

<?php 

// ambil point user
$points = (int) $rowUser['points'];

// masukkan kode get emblem untuk mengambil semua user emblem
require_once 'controller/get-emblems.php';
get_emblems();

?>

<div class="wrap-container">

	<!--navigasi-->
	<div class="navbar fixed-top navbar-hb navbar-expand-md navbar-light">
		<div class="container">
			
			<div class="navbar-brand">
				<a href="../">
					<img src="../assets/img/logo.png" width="60px">
				</a>
			</div>

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menuKita">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="menuKita">
				<ul class="navbar-nav nav-li-hb mr-auto">
					<li>
						<a class="nav-link" href="../stuckcoding/">StuckCoding</a>
					</li>
					<li>
						<a class="nav-link" href="../stuckloker/">StuckLoker</a>
					</li>
					<li>
						<a class="nav-link" href="../stucktutorial/">StuckTutorial</a>
					</li>
					<li>
						<a class="nav-link" href="../unstucker/">unStuckers</a>
					</li>
					<li>
						<form class="form-inline pt-1">
							<input class="form-control form-control-sm form-control-hb" type="text" name="cari" placeholder="Cari dulu lah...">
						</form>
					</li>
				</ul>
				
				<div class="dropdown show">

						<a class="btn-link important-color btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
								aria-haspopup="true" aria-expanded="false">
								<img src="../assets/uploads/<?php if (!file_exists('../assets/uploads/' . $rowUser['photo'])) { echo 'default.svg'; } else { echo $rowUser['photo']; } ?>" class="rounded-circle" style="width:20px; height:20px;"> <?=$rowUser['username'] ?>
						</a>

						<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
								<a class="dropdown-item important-color btn-sm" href="profile.php">Lihat Profil</a>
								<a class="dropdown-item important-color btn-sm" href="edit-profile.php">Edit Profil</a>
								<a class="dropdown-item important-color btn-sm" href="../logout.php">Keluar</a>
						</div>
				</div>

			</div>

		</div>
	</div>

	<!--banner-->
	<div class="container">
		
		<!-- profile -->
		<div class="row pt-5 mt-4">

			<div class="col-md-6">

				<div class="profile-picture">
					<a href="../assets/uploads/<?php if (!file_exists('../assets/uploads/' . $rowUser['photo'])) { echo 'default.svg'; } else { echo $rowUser['photo']; } ?>">
						<img src="../assets/uploads/
						<?php 
							if (!file_exists('../assets/uploads/' . $rowUser['photo'])) { 
								echo 'default.svg'; 
							} else {
								echo $rowUser['photo'];
							}
						?>" name="profil-picture" class="rounded-circle" width="100px" height="100px">
					</a>
				</div>

					<h2 class="nama-user mt-2 mb-0 font-weight-light">
						<?= $rowUser['nama']; ?>
					</h2>

					<p class="username">
						<small class="text-muted">
							<?= '@' . $rowUser['username']; ?>
						</small>
					</p>
					
					<div class="d-flex">

						<p class="p-2 mr-2 text-muted border">
							<small>emblem : </small>
							<?= $namaEmblem; ?>
						</p>
						
						<p class="p-2 mr-2 text-muted border">
							<small>points : </small>
							<?= $rowUser['points']; ?>
						</p>
						
						<p class="p-2 mr-2 text-muted border">
							<small>votes : </small>
							<?= $rowUser['votes']; ?>
						</p>

					</div>

					<blockquote class="blockquote font-weight-bold text-muted motto">
						<?= $rowUser['motto']; ?>
					</blockquote>

			</div>

			<div class="col-md-6">
				
				<p>
					<i class="fas fa-envelope-open mr-2 text-muted"></i>
					<a href="mailto: <?= $rowUser['email']; ?>">Email : 
						<?= $rowUser['email']; ?>
					</a>
				</p>
				
				<p>
					<i class="fas fa-envelope-open mr-2 text-muted"></i>
					<a href="<?= $rowUser['siteUrl']; ?>">Website : 
						<?= $rowUser['siteUrl']; ?>
					</a>
				</p>

				<p>
					<i class="fas fa-envelope-open mr-2 text-muted"></i>
					<a href="https://github.com/<?= $rowUser['github']; ?>">Github : 
						<?= $rowUser['github']; ?>
					</a>
				</p>

				<p>
					<i class="fas fa-envelope-open mr-2 text-muted"></i>
					<a href="https://twitter.com/<?= $rowUser['twitter']; ?>">Twitter : 
						<?= $rowUser['twitter']; ?>
					</a>
				</p>


			</div>

		</div>

		<hr>
	
		<!-- bio -->
		<div class="row">
			
			<!--biodata-->
			<div class="bio col-md-12">
				<h3>Bio</h3>
				<p>
					<?= nl2br($rowUser['bio']); ?>
				</p>
			</div>

		</div>

		<hr>
	
		<!--main-->
		<div class="row row-padding">

			<div class="col-md-6">

				<!-- input stuck -->
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

			</div>

			<div class="col-md-6">
				
				<!-- daftar emblem -->
				<div class="emblems">
					
					<div class="header rounded-top pt-2 pb-2">
						<h5> Emblems </h5>
					</div>

					<div class="content pt-4 d-flex justify-content-center">

						<!-- load emblem disini -->
						<?php 
							if ( count($emblem_list) > 0) {
								for ( $i = 0; $i < count($emblem_list); $i++ ) {
									?>
									<div class="col-md-3">
										<div class="text-center">

											<i class="fas fa-code fa-2x"></i>
											<p>
												<small class="text-muted">
												<?= $emblem_list[$i]['namaEmblem']; ?>
												</small>
											</p>
											
										</div>
									</div>
									<?php
								}
							} 
						?>

					</div>

				</div>

			</div>

		</div>

		<!-- history stucks -->
		<div class="row">

			<div class="col-md-12">

					<h4 class="judul">Riwayat Stuck</h4>
					<?php 
					require_once 'controller/tampil-history-stuck.php';
					
					if (count($result) > 0) {
						
						// jika stuck yang dimiliki lebih dari 0, maka tampilkan ke riwayat stuck
						for ($i = 0; $i < count($result); $i++) {
							
					?>
					
					<a href="../stuck/stuck.php?id=<?= $result[$i]['stuckId']; ?>">
						<div class="card card-floating">
							<div class="card-body card-padding">
								<div class="row col-md-12">
									<div class="component row col-md-3 col-2">
										<div class="col-12 col-md-4">
											<div class="row row-title text-center">
												<small>votes</small>
											</div>
											<div class="row row-desc">
												<h5><?= (int) $result[$i]['votes']; ?></h5>
											</div>
										</div>
										<div class="col-12 col-md-4">
											<div class="row row-title text-center">
												<small>views</small>
											</div>
											<div class="row row-desc">
												<h5><?= (int) $result[$i]['views']; ?></h5>
											</div>
										</div>
										<div class="col-12 col-md-4">
											<div class="row row-title text-center">
												<small>answer</small>
											</div>
											<div class="row row-desc">
												<h5>0</h5>
											</div>
										</div>
									</div>

									<div class="component col-10 col-md-9">
										<div>
											<h5><?= $result[$i]['title']; ?></h5>

											<p class="no-margin keterangan text-muted">ditanya <?= $result[$i]['editDate']; ?>
											</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</a>
					<?php 
						}						
					}
				?>

			</div>
		
		</div>

	</div>

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
					<b class="bold">Made with love</b> by
					<b>Humble Bee</b> Copyright 2018.</p>
			</div>
		</div>
	</div>
	
</div>



</body>

</html>