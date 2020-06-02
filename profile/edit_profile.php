<?php 

require_once "../auth.php";
require_once "controller/get_profile.php";
require_once "../helper.php";

$nim = $_SESSION["userNim"];
$userData = getDataProfile($nim);

if ( !file_exists("uploads/".$userData['photo']) ) {
	$userData["photo"] = "default.png";
} 

$photo = "uploads/".$userData["photo"];

?>

<!DOCTYPE html>
<html>

<head>
  
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Edit Profile | unStuckInAja!</title>

  <!-- LOAD STYLESHEETS DISINI -->
	<link rel="shortcut icon" type="images/x-icon" href="<?=BASE_URL."assets/img/favicon.png"?>">
	
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">

  <link rel="stylesheet" href="<?=BASE_URL."assets/css/bootstrap.min.css"?>">

  <link rel="stylesheet" href="<?=BASE_URL."assets/css/style.css"?>">

  <link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet">

</head>

<body>
	
	<!-- LOAD HEADER -->
	<?php include_once "../templates/header.php"?>
	
	<!-- FORM AKUN -->
	<div class="container mb-5">
		<div class="row row-padding">

			<!--setting menu-->
			<div class="col-md-3 mr-4 sidebar-offcanvas" id="sidebar">
				<div class="list-group-item header p-3 bg-light">
				<h5>Pengaturan Pribadi</h5>
				</div>
				<div class="list-group">

				<a href="" class="list-group-item content text-muted active-sidebar">Profile</a>
				<a href="edit_account.php" class="list-group-item content text-muted">Akun</a>
				</div>
			</div>

			<!--setting profil-->
			<div class="col-md-8">
				<h4 class="pb-1 pt-2">Profil Umum</h4>

				<!-- ERROR MESSAGE -->
        <?php 

				if ( isset($_SESSION["statusUpdateProfile"]) ) {

					$status = $_SESSION["statusUpdateProfile"];
					$message = null;
					$alertType = null;
					
					switch ($status) {
						case "emptyInput":
							$message = "Oops, pastikan Anda mengisi kolom nama";
							$alertType = "warning";
							break;

						case "invalidURL":
							$message = "Oops, pastikan Anda memasukkan alamat web yang benar";
							$alertType = "warning";
							break;

						case "invalidEmail":
							$message = "Oops, pastikan Anda memasukkan alamat email yang benar";
							$alertType = "warning";
							break;

						case "invalidImage":
							$message = "Oops, pastikan Anda memasukkan gambar dan tidak lebih dari 2MB";
							$alertType = "warning";
							break;

						case "failed":
							$message = "Oops, telah terjadi kesalahan pada sistem";
							$alertType = "danger";
							break;

						case "success":
							$message = "Yoshaa! Profile telah berhasil di update";
							$alertType = "success";
							break;
					}
					
					?>
					<div class="alert alert-<?=$alertType?> alert-dismissible fade show mt-3" role="alert">
					
						<?=$message?>
							
						<button class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						
					</div>
					
					<?php
					
					unset($_SESSION["statusUpdateProfile"]);

				}

				?>
				
				<hr>

				<form action="controller/update_profile.php" method="POST" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-4 order-md-last order-sm-first">
								
								<div>
									<h5 class="pb-1">Upload Foto</h5>
									<img src="<?=$photo?>" alt="Photo profile" class="img-fluid pb-3 rounded">

									<input type="file" class="form-control btn-sm" name="photo">

									<p>
										<small>Ukuran maksimal : 2MB</small>
									</p>
								</div>					

							</div>

						<div class="col-md-8 order-md-first order-sm-last">
							
							<div class="form-group">
								<label for="nama">Nama Lengkap</label>
								<input type="text" class="form-control" name="nama" value="<?=$userData['nama']?>" required>
							</div>

							<div class="form-group">
										<label for="motto">Motto</label>
										<textarea class="form-control motto" name="motto"><?=strip_tags($userData['motto'])?></textarea>
							</div>

							<div class="form-group">
								<label for="bio">Bio</label>
								<textarea rows="6" class="form-control" name="bio"><?=strip_tags($userData['bio'])?></textarea>
							</div>

							<div class="form-group">
								<label for="email">Email</label>
								<input name="email" type="email" class="form-control" value="<?=$userData['email']?>">
							</div>

							<div class="form-group">
								<label for="github">Github</label>
								<input name="github" type="text" class="form-control" value="<?=$userData['github']?>">
							</div>

							<div class="form-group">
								<label for="twitter">Twitter</label>
								<input name="twitter" type="text" class="form-control" value="<?=$userData['twitter']?>">
							</div>

							<div class="form-group">
								<label for="siteURL">Website URL</label>
								<input name="siteURL" type="text" class="form-control" value="<?=$userData['siteUrl']?>">
							</div>
					
							<button name="update" class="btn btn-default btn-block">Simpan perubahan</button>
					
						</div>

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
