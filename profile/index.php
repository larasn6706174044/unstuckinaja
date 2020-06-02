<?php 
require_once "./../helper.php";
require_once "../auth.php";
require_once "./controller/get_profile.php";
require_once "./controller/get_emblem.php";
require_once "./controller/tampil_history_stuck.php";
require_once "./../stuck/controller/tampil_tags.php";

$nim = $_SESSION["userNim"];
$userData = getDataProfile($nim);
$points = $userData["points"];

setNewEmblem();

$emblemList = getUserEmblem();
$lastEmblem = $emblemList[0]["namaEmblem"];

?>

<!DOCTYPE html>
<html>

<head>
  
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?=$userData["username"] ?> | unStuckInAja!</title>

  <!-- LOAD STYLESHEETS DISINI -->
	<link rel="shortcut icon" type="images/x-icon" href="<?=BASE_URL."assets/img/favicon.png"?>">
	
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i" rel="stylesheet">

  <link rel="stylesheet" href="<?=BASE_URL."assets/css/bootstrap.min.css"?>">

  <link rel="stylesheet" href="<?=BASE_URL."assets/css/style.css"?>">

	<link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet">
	
	<script src="<?=BASE_URL."assets/js/ckeditor/ckeditor.js"?>"></script>

</head>

<body>
	
	<!-- LOAD HEADER -->
	<?php include_once "../templates/header.php"?>

	<div class="container">

		<div class="row mt-5 mb-5">
	
				<div class="col-md-4 pt-5">
					<!-- FOTO -->
					<div style="overflow: auto">
					<?php 
						$photo = ( ! file_exists("./uploads/" . $userData["photo"]) ? "default.png" : $userData["photo"] );
					?>
						<img id="profile-image" class="img-fluid rounded shadow" src="./uploads/<?=$photo ?>" alt="<?=$userData["username"]?> Photo">
						</div>
					<!-- NAMA -->
					<h3 class="pt-1 m-0 font-weight-light"><?=$userData["nama"]?></h3>
					<!-- USERNAME -->
					<p class="p-0 text-muted">@<?=$userData["username"]?></p>
					<!-- MOTTO -->
					<p style="max-width: 250px">
						<small>
							<?=$userData["motto"]?>
						</small>
					</p>
					<!--EMBLEMS-->
					<div class="border rounded p-2 my-3">
						<h5 class="pt-2 pl-2">Emblems</h5>  
						<hr>
				    <div class="row rounded p-3">
							<!-- load daftar emblem user -->
							<?=loadViewEmblem()?>
						</div>								
					</div>
					<!-- SOSMED -->
					<?php
						if ($userData["email"] != null || $userData["email"] != "") {
							?>
								<small><i class="pr-5 fas fa-envelope-open"></i> <?=$userData["email"]?></small>
								<hr>
							<?php
						} 

						if ($userData["siteUrl"] != null || $userData["siteUrl"] != "") {
							?>
								<small><i class="pr-5 fas fa-link"></i> <?=$userData["siteUrl"]?></small>
								<hr>
							<?php
						} 

						if ($userData["github"] != null || $userData["github"] != "") {
							?>
								<small><i class="pr-5 fab fa-github"></i> <?=$userData["github"]?></small>
								<hr>
							<?php
						} 

						if ($userData["twitter"] != null || $userData["twitter"] != "") {
							?>
								<small><i class="pr-5 fab fa-twitter"></i> <?=$userData["twitter"]?></small>
								<hr>
							<?php
						} 

					?>

					<!-- BIO -->
					<div class="border rounded p-2">
						<h5 class="pt-2 pl-2">Bio</h5>
						<hr>
						<p>
							<small class="text-muted">
								<?=$userData["bio"]?>
							</small>
						</p>
					</div>
				</div>
				
          <div class="col-md-8 pt-5">
						
            <div class="row">
							
              <div class="col-md-12">
								<h3 class="float-left">Riwayat Stuck</h3>
								<button class="btn btn-default float-right" data-toggle="modal" data-target="#inputStuck">Input Stuck</button>

								<div class="clearfix"></div>
								<?php 

								if ( isset($_SESSION["statusStuck"]) ) {
					
									$status = $_SESSION["statusStuck"];
									$message = null;
									$alertType = null;
									$isLoggedIn = false;
									
									if ($status === "emptyInput") {
										$message = "Oops, pastikan Anda mengisi seluruh input";
										$alertType = "warning";
									} else if ($status === "failed") {
										$message = "Oops, terjadi kesalahan pada sistem";
										$alertType = "danger";
									} else if ($status === "success") {
										$message = "Yoshaa! Stuck telah berhasil diinput";
										$alertType = "success";
									}
									?>
									<div class="alert alert-<?=$alertType?> alert-dismissible fade show mt-3" role="alert">
									
										<?=$message?>
											
										<button class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
										
									</div>
									
									<?php
									
									unset($_SESSION["statusStuck"]);

								}
								
								?>

								<hr>

							</div>
								
						</div>

						<div class="row">
							
							<!-- DAFTAR STUCK -->
							<?=loadViewHistory()?>

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
				<form action="<?=BASE_URL.'stuck/controller/insert_stuck.php'?>" method="POST">
					<div class="modal-body">
						<input type="text" class="form-control" name="title" placeholder="Masukkan judul Stuck" required><br>
						
						<textarea class="ckeditor" id="ckedtor" name="detail" required></textarea>
						<br/>
						<select class="custom-select" name="tag" required>
						<option value="null" selected>Pilih Tag</option>
							<?=loadViewTags();?>
						</select>
							
					</div>
					<!-- footer modal -->
					<div class="modal-footer">
						<button class="btn btn-default" name="submit">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- LOAD JS DISINI -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	
</body>

</html>