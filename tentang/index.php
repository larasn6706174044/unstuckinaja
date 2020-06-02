<?php 
require_once "./../helper.php";
?>

<!DOCTYPE html>
<html>

<head>
  
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Tentang | unStuckInAja!</title>

  <!-- LOAD STYLESHEETS DISINI -->
	<link rel="shortcut icon" type="images/x-icon" href="<?=BASE_URL."assets/img/favicon.png"?>">
	
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i" rel="stylesheet">

  <link rel="stylesheet" href="<?=BASE_URL."assets/css/bootstrap.min.css"?>">

	<link rel="stylesheet" href="<?=BASE_URL."assets/css/main.css"?>">

	<link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet">
	
	<script src="<?=BASE_URL."assets/js/ckeditor/ckeditor.js"?>"></script>

  <style>
    .profile-img {
      display: block;
      height: 10em;
      margin-right: auto;
      margin-left: auto;
      border-radius: 100%;
      box-shadow:5px 5px 10px rgba(0, 0, 0, 0.1);

    }
    .grayscale:hover {
      -webkit-filter: grayscale(0);
      filter: grayscale(0);
      cursor: pointer;
      transition: 1s;
    }
    .grayscale {
      -webkit-filter: grayscale(1);
      filter: grayscale(1);
    }

  .profile-text {
      border-top : 6px solid #35C197;
      margin-top: -3.5em;
      padding: 5em 1.5em 1.5em 1.5em; 
      background: white;
      border-radius: 3px;
      box-shadow:5px 5px 10px rgba(0, 0, 0, 0.1);
      color:#3f3f3f

  }
  .kenalan{
    color:#3f3f3f;
    letter-spacing:.1em;
  }
  .profile-name{
    margin-right: -1em;
    margin-bottom: .75em;
    margin-left: -1em;
    border-bottom: 1px solid rgba(0,0,0,0.1);
    padding-bottom: .75em;
    letter-spacing: .2em;
  }
  </style>

</head>
<body>

  <?php include_once "../templates/header.php";?>

    <!--banner-->
    <div class="row row-padding banner-tentang">
      <div class="bg-gradient"></div>
      <div class="container">
          <div class="row row-padding text-center">
              <div class="profil-photo col-md-12 d-flex justify-content-center">
                  <div class="profile-picture">
                    <img src="../assets/images/logo.png" name="profil-picture" class="img-fluid">
                  </div>
              </div>
              <div class="nama-user col-md-12">
                  <h1>Tentang Kami</h1>
              </div>
              <div class="username col-md-8 offset-md-2">
                  <p class="deskripsi">Work from heart, made with love.</p>
              </div>
          </div>
      </div>
    </div>

    <!--main-->
    <div class="container">
      <div class="row row-padding">
        <!--tentang-->
        <div class="col-md-8 offset-md-2 text-center">
          <h4 class="font-weight-bold mb-5">Tentang unStuckInAja</h4>
          <p>UnStuckInAja merupakan sebuah forum platform tanya jawab khususnya untuk para mahasiswa D3 Teknik Informatika yang dibentuk pada tahun 2018. Dengan fitur utama Stuck Coding, Stuck Tutorial, dan Stuck Loker akan membantu teman-teman dalam menyelesaikan permasalahan seputar pemrograman. Membangun developer-developer handal di masa di masa depan.</p>
        </div>
      </div>
    </div>
        <!--tujuan-->
    <div class="batas" style="background-color:#f5f5f5">
      <div class="container  text-center">
        <div class="row">
          <div class="col-md-12">
            <h4 class="font-weight-bold my-5" style="letter-spacing:.1em">Tujuan Kami</h4>
            <div class="row">
              <div class="offset-md-1 col-md-3">
                <img src="../assets/images/icon-stuckcoding.png" alt="" class="img-fluid mb-3">
                <p>membantu para programmer dalam menyalesaikan masalah seputar pemrograman</p>
              </div>
              <div class="col-md-4 px-5">
                <img src="../assets/images/icon-stucktutorial.png" alt="" class="img-fluid mb-3">
                <p>menyediakan referensi tutorial pilihan yang bisa membantu para pengguna untuk menambah wawasan seputar pemrograman</p>
              </div>
              <div class="col-md-3">
                <img src="../assets/images/icon-stuckloker.png" alt="" class="img-fluid  mb-3">
                <p>memberikan wadah bagi para pengguna untuk mencari pekerjaan yang sesuai dengan kemampuan pengguna</p>
              </div>
            </div>
          </div>
        </div>

        <!--kenalan-->
        <hr>
        <h4 class="font-weight-bold pt-2 kenalan">Kenalan Yuk!</h4>
        <div class="row">

          <div class="col-md-4 offset-md-1 p-5">
            <img src=../assets/images/laras.jpg class="grayscale profile-img img-fluid">
            <div class="profile-text">
              <p class="profile-name card-title">Fadli Hidayatullah</p>
              <p class="font-weight-bold">Founder</p>
              <p class="font-weight-bold">Taat Pasti Bahagia, Maksiat Pasti Sengara</p>
              <hr>
              <div class="row">
                <h3 class="col-md-4"><a href="https://www.instagram.com/" ><i class="fab fa-instagram"></i></a></h3>
                <h3 class="col-md-4"><a href="https://twitter.com"><i class="fab fa-twitter"></i></a></h3>
                <h3 class="col-md-4"><a href="https://facebook.com"><i class="fab fa-facebook-square"></i></a></h3>
              </div>
            </div>
          </div>

          <div class="col-md-4 offset-md-2 p-5">
            <img src=../assets/images/laras.jpg class="grayscale profile-img img-fluid">
            <div class="profile-text">
              <p class="profile-name card-title">Laras Nurhayatunnufus</p>
              <p class="font-weight-bold">Founder</p>
              <p class="font-weight-bold">Lakukan yang terbaik, biar suksesmu yang berbicara</p>
              <hr>
              <div class="row">
                <h3 class="col-md-4"><a href="https://www.instagram.com/" ><i class="fab fa-instagram"></i></a></h3>
                <h3 class="col-md-4"><a href="https://twitter.com"><i class="fab fa-twitter"></i></a></h3>
                <h3 class="col-md-4"><a href="https://facebook.com"><i class="fab fa-facebook-square"></i></a></h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--ALAMAT-->
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h4 class="font-weight-bold my-5" style="letter-spacing:.1em">Kantor Kami</h4>
          <p style="font-size:18px">Jl. Telekomunikasi Nomor 01, Terusan Buah Batu, Sukapura, Dayeuhkolot, Sukapura, Dayeuhkolot, Bandung, Jawa Barat 40257</p>
        </div>
        <div class="col-md-7 offset-md-1 pt-4">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1980.1495476818357!2d107.6292537!3d-6.9739957!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6285c5b7da517%3A0x864485f26a388f95!2sUniversitas+Telkom!5e0!3m2!1sid!2sid!4v1524575230448" width="600" height="300" frameborder="0" style="border:0" class="shadow" allowfullscreen></iframe>
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
