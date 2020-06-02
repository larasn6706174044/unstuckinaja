<?php 

require_once '../auth.php';

// masukkan nilai variable session ke variable
$user_data = $_SESSION['user_data'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Your Profile</title>
	
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.png">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/app.css">
	<link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet">
	<script src="../assets/js/bootstrap.min.js"></script>
	<script src="../assets/js/proper.min.js"></script>
	<script src="../assets/js/jquery-3.3.1.min.js"></script>

</head>
<body class="bg-light p-3">
	<!-- TODO: pasang validasi javascript -->
	<!-- masukkan value setiap input berdasarkan user_data -->

	<div class="container mt-4">
		<div class="row">
		
			<div class="col-md-6">
				<h4 class="font-weight-light">Pengaturan Profile</h4>

				<?php 

				$status = isset($_GET['error']);
				if ($status) {
					$err = $_GET['error'];
					$message = null;

					if ($err == 'image_failed') {
						$message = "Pastikan yang kamu upload adalah gambar dan ukuran maks. 1MB.";
					} else if ($err == 'upload_failed') {
						$message = "Terjadi kesalahan dalam mengupload gambar.";
					} else if ($err == 'invalid_url') {
						$message = "Mohon masukkan url yang valid e.g http://www.example.com";
					}

					echo "
					<div class='alert alert-warning alert-dismissible fade show mt-3' role='alert'>
						{$message} 
						<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
							<span aria-hidden='true'>&times;</span>
						</button>
					</div>";
					
				}
				?>

				<form action="controller/update-profile.php" method="POST" enctype="multipart/form-data">

					<div class="form-group">
						<label for="">Nama Lengkap</label>
						<input id="nama" name="nama" type="text" value="<?php echo $user_data['nama']; ?>" placeholder="nama" class="form-control" required>
					</div>

					<div class="form-group">
						<img src="img/
							<?php 
								if (!file_exists('img/' . $user_data['photo'])) { 
									echo 'default.svg'; 
								} else {
									echo $user_data['photo']; 
								}
							?>" alt="avatar" width="100">
						<input class="form-control-file mt-2" id="image-file" type="file" name="photo">
						<small>Ukuran maks. 1MB</small>
						
					</div>
					
					<div class="form-group">
						<label for="">Motto</label>
						<textarea class="form-control" name="motto" id="motto" cols="30" rows="4" placeholder="Motto" maxlength="60"><?php echo strip_tags($user_data['motto']); ?></textarea>
					</div>

					<div class="form-group">
						<label for="">Bio</label>
						<textarea class="form-control" name="bio" id="bio" cols="30" rows="8" placeholder="Bio"><?php echo strip_tags($user_data['bio']); ?></textarea>
					</div>

					<div class="form-group">
						<label for="">Email</label>
						<input class="form-control" id="email" name="email" type="email" placeholder="Email" value="<?php echo $user_data['email']; ?>">
					</div>
					
					<div class="form-group">
						<label for="">Twitter</label>
						<input class="form-control" id="twitter" name="twitter" type="text" placeholder="Twitter" value="<?php echo $user_data['twitter']; ?>">
					</div>

					<div class="form-group">
						<label for="">Github</label>
						<input class="form-control" id="github" name="github" type="text" placeholder="Github" value="<?php echo $user_data['github']; ?>">
					</div>

					<div class="form-group">
						<label for="">Site Url</label>
						<input class="form-control" id="siteUrl" name="siteUrl" type="text" placeholder="Site Url" value="<?php echo $user_data['siteUrl']; ?>">
					</div>
					

					<button class="btn btn-custom text-white" name="update-profile">Simpan Perubahan</button>
				</form>

			</div>

			<div class="col-md-6">
				<h4 class="font-weight-light">Pengaturan Akun</h4>
				<?php 

				$status = isset($_GET['error']);
		
				if ($status) {
					$err = $_GET['error'];
					$message = null;

					if ($err == 'pwd_mismatch') {
						$message = "Password baru dan Konfirmasi password tidak sama.";
					} else if ($err == 'username_exists') {
						$message = "Username telah digunakan oleh orang lain.";
					} else if ($err == 'pwd_failed') {
						$message = "Password salah. <a href='lupa-password.php'>Lupa password?</a>";
					} else if ($err == 'update_failed') {
						$message = "Terjadi kesalahan dalam mengupdate.";
					} else if ($err == 'registered_member') {
						$message = "Username telah digunakan.";
					}

					echo "
					<div class='alert alert-warning alert-dismissible fade show mt-3' role='alert'>
						{$message} 
						<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
							<span aria-hidden='true'>&times;</span>
						</button>
					</div>";
					
				}
				?>

				<form action="controller/update-password.php" method="POST">
					<h5 class="font-weight-light">Ganti Password</h5>
					<div class="form-group">
						<label for="oldPwd">Password Lama</label>
						<input type="password" class="form-control" id="oldPwd" name="oldPwd" placeholder="Password lama kamu" required>
					</div>

					<div class="form-row">
						<div class="col">
							<label for="newPwd">Password baru</label>
							<input type="password" class="form-control" id="newPwd" name="newPwd" placeholder="Password baru" required>
						</div>

						<div class="col">
							<label for="confirmPwd">Password baru</label>
							<input type="password" class="form-control" id="confirmPwd" name="confirmPwd" placeholder="Konfirmasi Password" required>
						</div>
					
					</div>
					
					<button class="btn btn-custom text-white mt-4" name="update-password">Update Password</button>
				</form>

				<form action="controller/update-username.php" method="POST" class="mt-4">
					<h5 class="font-weight-light">Ganti Username</h5>
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" class="form-control" id="username" name="username" placeholder="Username kamu" value="<?php echo $user_data['username']; ?>" required>
					</div>

					<div class="form-group">
						<label for="password">Password Lama</label>
						<input type="password" class="form-control" id="password" name="password" placeholder="Password kamu" required>
					</div>

					<button class="btn btn-custom text-white mt-4" name="change-username">Ganti Username</button>
					
				</form>


			</div>

		</div> <!-- end of row -->

	</div> <!-- end of container -->


</body>
</html>