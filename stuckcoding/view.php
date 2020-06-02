<?php 
// masukkan kode model
require_once '../model/model.php';

?>

<!DOCTYPE html>
<html>

<head>
  <title>StuckCoding</title>

  <!-- load favicon -->
  <link rel="shortcut icon" type="images/x-icon" href="../assets/img//favicon.png">

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
  
</head>

<body>
  
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
              <a class="nav-link" id="active-link" href="#">StuckCoding</a>
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
              <form class="form-inline">
                <input class="form-control form-control-sm form-control-hb" type="text" name="cari" placeholder="Cari dulu lah...">
              </form>
            </li>

          </ul>

          <form class="form-inline pt-1">
            <a href="../login/" class="font-weight-normal mr-3">Masuk</a>
            <a href="../daftar/" class="btn btn-sm btn-custom pl-3 pr-3 text-white">Daftar</a>
          </form>

        </div>

      </div>
      <!-- akhir dari nav -->

    </div>

    <!--banner-->
    <div class="row row-padding banner-stuckcoding">
      <div class="bg-gradient"></div>
      <div class="container">
        <div class="row row-padding text-center">
          <div class="profil-photo col-md-12 d-flex justify-content-center">
            <div class="profile-picture">
              <img src="../assets/img/icon-unstucker.png" name="profil-picture" class="img-fluid">
            </div>
          </div>
          <div class="nama-user col-md-12">
            <h1>StuckCoding</h1>
          </div>
          <div class="username col-md-8 offset-md-2">
            <p class="deskripsi">nge-stuck dengan koding mu yang ruwet? nge-stuck tiada akhir? unStuckIn permasalahan koding mu disini</p>
          </div>
        </div>
      </div>
    </div>

    <!--main-->
    <div class="container">
      <div class="row row-padding">
        

        <!--trending stuck-->
        <div class="col-md-4">

          <div class="card mt-3 content shadow card-title p-1 text-center">
            <h4>Top</h4>
          </div>
        
          <?php
          require_once '../stuck/tampil-daftar-stuck.php'; 
          display_stuck('top');
          ?>
          
        </div>
        
        <!--trending stuck-->
        <div class="col-md-4">

          <div class="card mt-3 content shadow card-title p-1 text-center">
            <h4>Trending</h4>
          </div>
        
          <?php 
          display_stuck('trending');
          ?>
          
        </div>

        <!--recent stuck-->
        <div class="col-md-4">

          <div class="card mt-3 content shadow card-title p-1 text-center">
            <h4>Terbaru</h4>
          </div>
        
          <?php
          display_stuck('recent');
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
              <b class="important-color">unStuckInAja </b>adalah sebuah platform forum tanya jawab pemrograman yang didedikasikan untuk programmer Tel-U
              dalam menyelesaikan problem seputar pemrograman, refernsi tutorial dan lowongan pekerjaan di bidang IT.</p>
            <p class="sign">
              <b class="bold">Made with love</b> by
              <b>Humble Bee</b> Copyright 2018.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>