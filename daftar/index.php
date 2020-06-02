<?php
  session_start();
  require_once "../helper.php";
?>
<!DOCTYPE html>
<html>

<head>
  
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Daftar | unStuckInAja!</title>

  <!-- LOAD STYLESHEETS DISINI -->
	<link rel="shortcut icon" type="images/x-icon" href="<?=BASE_URL."assets/img/favicon.png"?>">
  
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
  
  <link rel="stylesheet" href="<?=BASE_URL."assets/css/bootstrap.min.css"?>">

  <link rel="stylesheet" href="<?=BASE_URL."assets/css/style.css"?>">

  <link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet">

</head>

<body class="base-color">

  <nav class="shadow navbar navbar-light bg-light d-flex justify-content-center">
    <a class="navbar-brand" href="index.php">
      <img src="<?=BASE_URL."assets/img/logo.png"?>" width="auto" height="24" class="d-inline-block align-top" alt="">
    </a>
  </nav>
  
  <div class="container">

    <!-- ERROR MESSAGE DISINI -->
    <div class="row">

      <!-- JARAK -->
      <div class="mt-5"></div>
        
      <div class="col-md-4 offset-md-4 p-0">
        <?php 

        if ( isset($_SESSION["statusDaftar"]) ) {
  
          $status = $_SESSION["statusDaftar"];
          $message = null;
          $alertType = null;
          
          switch ($status) {
            case "emptyInput":
              $message = "Oops, pastikan Anda mengisi seluruh input";
              $alertType = "warning";
              break;

            case "registeredAccount":
              $message = "Oops, sepertinya Anda sudah terdaftar";
              $alertType = "warning";
              break;

            case "nimNotFound":
              $message = "Oops, pastikan NIM kamu terdaftar sebagai mahasiswa Telkom University";
              $alertType = "danger";
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
              $message = "Yoshaa! Selamat Anda telah berhasil daftar";
              $alertType = "light";
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
          
          unset($_SESSION["statusDaftar"]);

        }
        
        ?>
    
      </div>
      
    </div>
    
    <!-- FORM -->
    <div class="row text-center">

      <div class="col-md-4 offset-md-4 p-5 rounded bg-light">
        <h3 class="font-weight-light ">Silahkan Daftar</h3>

        <p class="mb-4">Sudah punya akun? <a href="<?=BASE_URL."login/"?>">Login disini</a></p>

        <form action="controller/proses_daftar.php" method="POST">

          <!-- NIM -->
          <div class="form-group">
            
            <div class="input-group">
            
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-id-card"></i>
                </span>
              </div>
              
              <input name="nim" type="text" class="form-control"  placeholder="Masukkan NIM" maxlength="10" oninput="this.value=this.value.replace(/[^0-9]/g,'');" required>

            </div>

          </div>

          <!-- USERNAME -->
          <div class="form-group">
            
            <div class="input-group">
            
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-user-circle"></i>
                </span>
              </div>
              
              <input name="username" type="text" class="form-control"  placeholder="Masukkan Username" maxlength=16 required>

            </div>

          </div>

          <!-- NAMA LENGKAP -->
          <div class="form-group">
            
            <div class="input-group">
            
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-user"></i>
                </span>
              </div>
              
              <input name="nama" type="text" class="form-control"  placeholder="Masukkan Nama Lengkap" maxlength=60 required>

            </div>

          </div>

          <!-- PASSWORD -->
          <div class="form-group">

            <div class="input-group">

              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-key"></i>
                </span>
              </div>
              
              <input name="password" type="password" class="form-control" placeholder="Password" maxlength=16 required>

            </div>

          </div>

          <button type="submit" name="daftar" class="btn btn-default btn-block">Daftar</button>

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