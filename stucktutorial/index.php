<!DOCTYPE html>
<html>

<head>

  <title>StuckTutorial</title>

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
              <a class="nav-link" href="../stuckcoding/">StuckCoding</a>
            </li>
            <li>
              <a class="nav-link" href="../stuckloker/">StuckLoker</a>
            </li>
            <li>
              <a class="nav-link" href="#" id="active-link">StuckTutorial</a>
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
    <div class="row row-padding banner-stucktutorial">
      <div class="bg-gradient"></div>
      <div class="container">
        <div class="row row-padding text-center">
          <div class="profil-photo col-md-12 d-flex justify-content-center">
            <div class="profile-picture">
              <img src="../assets/img/logo-stucktutorial.png" name="profil-picture" class="img-fluid">
            </div>
          </div>
          <div class="nama-user col-md-12">
            <h1>StuckTutorial</h1>
          </div>
          <div class="username col-md-8 offset-md-2">
            <p class="deskripsi">Bingung dengan sumber belajar, tapi gak tahu mana yang bagus dan menjadi referensi banyak orang? Sekarang kamu
              bisa unStuckInAja! masalah tersebut dengan StuckTutorial</p>
          </div>
        </div>
      </div>
    </div>

    <!--main-->
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center align-item-center pt-5">
          <img src="../assets/img/logo-devtools.png" alt="DEV TOOLS">
          <h3 class="text-muted font-weight-bold pt-2">DEV TOOLS</h3>
        </div>
        <div class="col-md-4">
          <div class="card card-custom mt-3 content shadow p-3">
            <img src="../assets/img/vscode.png" alt="Visual Studio Code" class="col-md-2 no-padding pb-2">
            <h5>
              <a class="important-color pb-2 font-weight-bold" href="#">Visual Studio Code</a>
            </h5>
            <p class="text-muted">Text Editor besutan Microsoft ini berhasil memikat hati banyak programmer. Editor yang powerful, dengan integrasi
              terminal, dan lebih dari sekedar teks editor biasa.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-custom mt-3 content shadow p-3">
            <img src="../assets/img/chrome.png" alt="Visual Studio Code" class="col-md-2 no-padding pb-2">
            <h5>
              <a class="important-color pb-2 font-weight-bold" href="#">Google Chrome</a>
            </h5>
            <p class="text-muted">Salah satu web browser terpopuler saat ini, dilengkapi dengan web developer tools yang powerfull untuk kamu mengembangkan
              aplikasi web.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-custom mt-3 content shadow p-3">
            <img src="../assets/img/vscode.png" alt="Visual Studio Code" class="col-md-2 no-padding pb-2">
            <h5>
              <a class="important-color pb-2 font-weight-bold" href="#">Emmet</a>
            </h5>
            <p class="text-muted">Emmet suatu plugin untuk text editor dan membantu kamu dalam menulis kode lebih cepat, Rapid development,, menulis
              HTML dan CSS.</p>
          </div>
        </div>
        <div class="col-md-12 text-center align-item-center pt-5">
          <img src="../assets/img/logo-html.png" alt="HTML5">
          <h3 class="text-muted font-weight-bold pt-2">HTML RESOURCES</h3>
        </div>
        <div class="col-md-4">
          <div class="card card-custom mt-3 content shadow p-3">
            <img src="../assets/img/book.png" class="col-md-2 no-padding pb-2">
            <h5>
              <a class="important-color pb-2 font-weight-bold" href="#">HTML Cheat Sheet</a>
            </h5>
            <p class="text-muted">Referensi untuk kode-kode HTML5 lengkap, akses dimana pun dan kapan pun dengan mudah.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-custom mt-3 content shadow p-3">
            <img src="../assets/img/book.png" class="col-md-2 no-padding pb-2">
            <h5>
              <a class="important-color pb-2 font-weight-bold" href="#">HTML & CSS Shayhowe</a>
            </h5>
            <p class="text-muted">Ebook untuk belajar HTML & CSS tahap demi tahap, menjadi batu loncatan buat kamu menjadi Web Developer nantinya.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-custom mt-3 content shadow p-3">
            <img src="../assets/img/book.png" class="col-md-2 no-padding pb-2">
            <h5>
              <a class="important-color pb-2 font-weight-bold" href="#">HTML & CSS Codingheroes</a>
            </h5>
            <p class="text-muted">Belajar HTML dan CSS dari awal dan membuat rael world projects serta konsep dalam web desain. </p>
          </div>
        </div>
        <div class="col-md-12 text-center align-item-center pt-5">
          <img src="../assets/img/logo-css.png" alt="CSS Resources">
          <h3 class="text-muted font-weight-bold pt-2">CSS RESOURCES</h3>
        </div>
        <div class="col-md-4">
          <div class="card card-custom mt-3 content shadow p-3">
            <img src="../assets/img/book.png" class="col-md-2 no-padding pb-2">
            <h5>
              <a class="important-color pb-2 font-weight-bold" href="#">Advanced CSS Course</a>
            </h5>
            <p class="text-muted">Tingkatkan skill CSS mu dengan mempelajari modern development dengan CSS; Flexbox, SASS, Responsive, dan masih
              banyak lagi.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-custom mt-3 content shadow p-3">
            <img src="../assets/img/book.png" class="col-md-2 no-padding pb-2">
            <h5>
              <a class="important-color pb-2 font-weight-bold" href="#">CSS Tricks</a>
            </h5>
            <p class="text-muted">Referensi CSS lengkap dan tutorial dari beginner hingga advanced bisa kamu temukan di tempat ini.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-custom mt-3 content shadow p-3">
            <img src="../assets/img/book.png" class="col-md-2 no-padding pb-2">
            <h5>
              <a class="important-color pb-2 font-weight-bold" href="#">CSS Cheat Sheet</a>
            </h5>
            <p class="text-muted">Belajar HTML dan CSS dari awal dan membuat real world projects serta konsep dalam web desain.</p>
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
  </div>

</body>

</html>