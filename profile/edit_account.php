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
  <title>Edit Account | unStuckInAja!</title>

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
	
	<div class="container mb-5">
		<div class="row row-padding">

			<!--setting menu-->
			<div class="col-md-3 mr-4 sidebar-offcanvas" id="sidebar">
				<div class="list-group-item header p-3 bg-light">
				<h5>Pengaturan Pribadi</h5>
				</div>
				<div class="list-group">

				<a href="edit_profile.php" class="list-group-item content text-muted">Profile</a>
				<a href="" class="list-group-item content text-muted active-sidebar" active-sidebar>Akun</a>
				</div>
			</div>
			
			
			<!-- GANTI PASSWORD DAN USERNAME -->
			<div class="col-md-8">

				<div class="row">

					<!-- GANTI PASSWORD -->
					<div class="col-md-12">
						
						<h4 class="pb-1 pt-2">Ganti Password</h4>
		
						<!-- ERROR MESSAGE -->
						<?php 
		
						if ( isset($_SESSION["statusUpdatePassword"]) ) {
		
							$status = $_SESSION["statusUpdatePassword"];
							$message = null;
							$alertType = null;
							
							switch ($status) {
								case "emptyInput":
									$message = "Oops, pastikan Anda mengisi seluruh input";
									$alertType = "warning";
									break;
		
								case "passwordMismatch":
									$message = "Oops, password baru dan konfirmasi password tidak sama";
									$alertType = "warning";
									break;
		
								case "invalidPassword":
									$message = "Oops, password lama yang Anda masukkan salah";
									$alertType = "warning";
									break;
		
								case "failed":
									$message = "Oops, telah terjadi kesalahan pada sistem";
									$alertType = "danger";
									break;
		
								case "success":
									$message = "Yoshaa! Password telah berhasil di update";
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
							
							unset($_SESSION["statusUpdatePassword"]);
		
						}
		
						?>
						
						<hr>
		
						<form action="controller/update_password.php" method="POST">
							
							<div class="col-md-8">

								<div class="form-group">
									<label for="old">Password Lama</label>
									<input type="password" class="form-control" name="old" required>
								</div>
	
								<div class="form-group">
									<label for="new">Password Baru</label>
									<input type="password" class="form-control" name="new" required>
								</div>
	
								<div class="form-group">
									<label for="confirm">Konfirmasi Password</label>
									<input type="password" class="form-control" name="confirm" required>
								</div>
	
								<button name="updatePassword" class="btn btn-default btn-block">Perbarui Password</button>
						
							</div>
							
						</form>

					</div>
					
					<!-- GANTI PASSWORD -->
					<div class="col-md-12 mt-5">
						
						<h4 class="pb-1 pt-2">Ganti Username</h4>
		
						<!-- ERROR MESSAGE -->
						<?php 
		
						if ( isset($_SESSION["statusUpdateUsername"]) ) {
		
							$status = $_SESSION["statusUpdateUsername"];
							$message = null;
							$alertType = null;
							
							switch ($status) {
								case "emptyInput":
									$message = "Oops, pastikan Anda mengisi seluruh input";
									$alertType = "warning";
									break;
		
								case "invalidAccount":
									$message = "Oops, username atau password salah";
									$alertType = "warning";
									break;
		
								case "usernameAlreadyUsed":
									$message = "Oops, username telah digunakan";
									$alertType = "warning";
									break;
		
								case "failed":
									$message = "Oops, telah terjadi kesalahan pada sistem";
									$alertType = "danger";
									break;
		
								case "success":
									$message = "Yoshaa! Username telah berhasil di update";
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
							
							unset($_SESSION["statusUpdateUsername"]);
		
						}
		
						?>
						
						<hr>
		
						<form action="controller/update_username.php" method="POST">
							
							<div class="col-md-8">

								<div class="form-group">
									<label for="old">Username Lama</label>
									<input type="text" class="form-control" name="old" required>
								</div>
	
								<div class="form-group">
									<label for="new">Username Baru</label>
									<input type="text" class="form-control" name="new" required>
								</div>
	
								<div class="form-group">
									<label for="password">Password</label>
									<input type="password" class="form-control" name="password" required>
								</div>
	
								<button name="updateUsername" class="btn btn-default btn-block">Perbarui Username</button>
						
							</div>
							
						</form>

					</div>
					
				</div>

			</div>
				
		</div>	
		
	</div>

	<!-- LOAD JS DISINI -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



</body>

</html>
