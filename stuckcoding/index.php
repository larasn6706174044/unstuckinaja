<?php
session_start();
require_once "./../helper.php";
require_once "./controller/display.php";

require_once "../profile/controller/get_profile.php";

function isLogin() {
  return isset($_SESSION['userNim']);
}

if (isLogin()) {
  $nim = $_SESSION["userNim"];
  $userData = getDataProfile($nim);
}


?>
<!DOCTYPE html>
<html>

<head>

  <title>StuckCoding | unStuckInAja!</title>

<!-- load favicon -->
  <link rel="shortcut icon" type="images/x-icon" href=<?= BASE_URL."assets/img/favicon.png"?>>

  <!-- enable responsive -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- load font -->
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">

  <!-- load css -->
  <link rel="stylesheet" href=<?= BASE_URL."assets/css/bootstrap.min.css"?>
  <link rel="stylesheet" href=<?= BASE_URL."assets/css/main.css"?>>

  <!-- load font awesome -->
  <link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet">

  <!-- load bootstrap min js dan jquery -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  

  <script src="<?=BASE_URL."assets/js/ckeditor/ckeditor.js"?>"></script>

</head>


<body>

  <!-- LOAD HEADER -->
  <?php include_once "../templates/header.php" ?>

  <!--banner-->
  <div class="row row-padding banner-homepage">
    <div class="bg-gradient"></div>
    <div class="container">
        <div class="row row-padding text-center">
          <div class="profil-photo col-md-12 d-flex justify-content-center">
            <div class="profile-picture">
              <img src="<?=BASE_URL?>assets/img/icon-stuckcoding.png" name="profil-picture" class="img-fluid">
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

  <div class="container mt-3">

    <div class="row">

      <div class="col-md-4">
        <h3 class="text-center">Top</h3>
        <?=display("top")?>
      </div>
      <div class="col-md-4">
        <h3 class="text-center">Trending</h3>
        <?=display("trending")?>
      </div>
      <div class="col-md-4">
        <h3 class="text-center">Terbaru</h3>
        <?=display("recent")?>
      </div>

    </div>

  </div>
  
  <div class="footer">
      <?php include_once "../templates/footer.php" ?>
  </div>

</body>

</html>