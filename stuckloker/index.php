<?php

session_start();

// masukkan kode model
require_once "../helper.php";
require_once '../model/model.php';

$connect = new mysqli("localhost","root","ngopi","unstuckinaja");

$userData = null;

if ( isset($_SESSION['userData']) ) {

  $userData = $_SESSION['userData'];

}

?>

<!DOCTYPE html>
<html>

<head>
  
  <title>unStuckInAja! | StuckLoker</title>

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
  
</head>

<body>
    
    <!-- LOAD HEADER -->
    <?php include_once "../templates/header.php" ?>
    <!-- container navigation -->

    <!--banner-->
    <div class="row row-padding banner-stuckloker">
      <div class="bg-gradient">
      </div>
        <div class="container">
          <div class="row row-padding text-center">
            <div class="profil-photo col-md-12 d-flex justify-content-center">
              <div class="profile-picture">
                <img src="../assets/images/logo-stuckloker.png" name="profil-picture" class="img-fluid">
              </div>
            </div>
            <div class="nama-user col-md-12">
              <h1>StuckLoker</h1>
            </div>
            <div class="username col-md-8 offset-md-2">
              <p class="deskripsi">Sekarang, kamu bisa jadi lebih mudah untuk nge-unStuckin lowongan pekerjaan di bidang IT yang membuat kamu jatuh cinta padanya.</p>
            </div>
          </div>
        </div>
    </div>

    <!--main-->
    <div class="container">
      <div class="row row-padding">

        <!--loker-->
        <div id="isi" class="row col-md-9">
          <?php 
          $query=$connect->query("SELECT * FROM loker");
          if ($query->num_rows != 0) {
            while ($row = $query->fetch_array()) {
          
          ?>

            <div class="col-md-4 pb-4 text-center">
              <div class="card card-custom content shadow">
                <a href="loker-page.php?id=<?php echo $row['lokerId']; ?>" class="text-muted">
                  <h5 class="banner text-white p-5"><?php echo $row['perusahaan']; ?> </h5>
                  <p><i class="fas fa-building"></i> <?php echo $row['title']; ?></p>
                  <div class="barisdua">
                    <small class="pr-1"><u><i class="far fa-clock"></i> <?php echo $row['jamKerja']; ?></u></small>
                    <small class="pl-1"><u><i class="fas fa-graduation-cap"></i> <?php echo $row['minLulusan']; ?></u></small>
                  </div>
                  <div class="baristiga">
                    <small class="float-left p-3"><i class="far fa-calendar-alt"></i> <?php echo $row['expDate']; ?></small>
                    <small class="float-right p-3"><i class="fas fa-map-marker"></i> <?php echo $row['lokasi']; ?></small>
                  </div>
                </a>
              </div>
            </div>

          <?php
            }
          }
          ?>
        </div>
        
        <!--sidebar-->
        <div class="col-md-3">
          <div class="input-stuck">
            <div class="header rounded-top pt-2 pb-2">
              <h5>
                Ngestuck?
              </h5>
            </div>
            <div class="content p-4 d-flex justify-content-center">
              <form action="" method="GET">
                <input type="text" name="katakunci" class="form-control form-control-sm mb-1" placeholder="Masukkan kata kunci..." onkeyup="cariLoker(this.value)">

                <select class="form-control-sm form-custom text-muted" name="berdasarkan-waktu" onclick="jamKerja(this.value)">
									<option selected value="default">Berasarkan Tipe Waktu</option>
                  <?php
                    $query = $connect->query("SELECT jamKerja FROM loker");
                    while ($rows=$query->fetch_array()) {

                  ?>
									<option value="<?php echo $rows['jamKerja']?>"><?php echo $rows['jamKerja']?></option>
                  <?php
                    }
                  ?>
                </select>

                <select class="form-control-sm form-custom text-muted" name="berdasarkan-lulusan" onclick="minLulusan(this.value)">
									<option selected value="default">Berasarkan Lulusan</option>
                  <?php
                    $query = $connect->query("SELECT minLulusan FROM loker");
                    while ($rows=$query->fetch_array()) {

                  ?>
									<option value="<?php echo $rows['minLulusan']?>"><?php echo $rows['minLulusan']?></option>
                  <?php
                    }
                  ?>
                </select>
                <select class="form-control-sm form-custom  text-muted" name="berdasarkan-lokasi" onclick="lokasi(this.value)">
									<option selected value="default">Berasarkan Lokasi</option>
									<?php
                    $query = $connect->query("SELECT lokasi FROM loker");
                    while ($rows=$query->fetch_array()) {

                  ?>
									<option value="<?php echo $rows['lokasi']?>"><?php echo $rows['lokasi']?></option>
                  <?php
                    }
                  ?>
                </select>
                <p class="kecil text-muted">*isi salah satu</p>
              </form>
            </div>
          </div>
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
</body>

</html>

<script type="text/javascript">
  var xhr = new XMLHttpRequest();
  function cariLoker(str) {
      xhr.open("GET","keyword.php?q="+str);
      xhr.onload = function() {
        document.getElementById("isi").innerHTML = this.responseText;
      }  
      xhr.send();
  }

	function jamKerja(str) {
      xhr.open("GET","jam-kerja.php?q="+str);
      xhr.onload = function() {
        document.getElementById("isi").innerHTML = this.responseText;
      }  
      xhr.send();
  }

  function minLulusan(str) {
      xhr.open("GET","min-lulusan.php?q="+str);
      xhr.onload = function() {
        document.getElementById("isi").innerHTML = this.responseText;
      }
      xhr.send();
  }
  function lokasi(str) {
      xhr.open("GET","lokasi.php?q="+str);
      xhr.onload = function() {
        document.getElementById("isi").innerHTML = this.responseText;
      }  
      xhr.send();
  }
</script>


