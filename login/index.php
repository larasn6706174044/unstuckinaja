<?php
  session_start();

  require_once "../helper.php";
  if ( isset($_SESSION["userNim"]) === true && isset($_SESSION["statusLogin"]) === false ) {
    header("location: ".BASE_URL."profile/");
  } 
?>
<!DOCTYPE html>
<html>

<head>
  
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login | unStuckInAja!</title>

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

        if ( isset($_SESSION["statusLogin"]) ) {
  
          $status = $_SESSION["statusLogin"];
          $message = null;
          $alertType = null;
          $isLoggedIn = false;
          
          if ($status === "emptyInput") {
            $message = "Oops, pastikan Anda mengisi seluruh input";
            $alertType = "warning";
          } else if ($status === "failed") {
            $message = "Oops, username/nim atau password salah";
            $alertType = "danger";
          } else if ($status === "success") {
            $message = "Yosh! Selamat kamu berhasil login";
            $alertType = "light";
            $isLoggedIn = true;
          }
          ?>
          <div class="alert alert-<?=$alertType?> alert-dismissible fade show mt-3" role="alert">
          
            <?=$message?>
              
            <button class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            
          </div>
          
          <?php
          
          unset($_SESSION["statusLogin"]);

          if ($isLoggedIn === true) {
            header("refresh: 1; url=".BASE_URL."profile/");
          }
        }
        
        ?>
    
      </div>
      
    </div>
    
    <!-- FORM -->
    <div class="row text-center">

      <div class="col-md-4 offset-md-4 p-5 rounded bg-light">
        <h3 class="font-weight-light ">Silahkan Login</h3>

        <p class="mb-4">Belum punya akun? <a href="<?=BASE_URL."daftar/"?>">Daftar disini</a></p>

        <form action="controller/proses_login.php" method="POST">

          <!-- USERNAME -->
          <div class="form-group">
            
            <div class="input-group">
            
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-user-circle"></i>
                </span>
              </div>
              
              <input name="username" type="text" class="form-control"  placeholder="Masukkan Username / NIM" required>

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
              
              <input name="password" type="password" class="form-control" placeholder="Password" required>

            </div>

          </div>

          <button name="login" class="btn btn-default btn-block">Log In</button>

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