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

  <!--main-->
  <div class="container">
      <div class="row row-padding">

        <!--kiri-->
        <div class="col-md-6 my-4">
          <h2 class="pb-3 font-weight-bold">Kontak Kami</h2>
          <p>Jika kamu mempunyai pertanyaan seputar bagaimana menggunakan <b>unStuckInAja!</b> , mau ngasih saran, mengirimkan rekomendasi tutorial,serta lowongan pekerjaan,<i>feel free</i> untuk mengontak kami.</p>
          <h2 class="mt-4 font-weight-bold">FAQ</h2>
          <h5 class="my-3 font-weight-bold">Apa itu unStuckInAja?</h5>
          <p>UnStuckInAja merupakan sebuah forum platform tanya jawab khususnya untuk para mahasiswa D3 Teknik Informatika yang dibentuk pada tahun 2018. Dengan fitur utama Stuck Coding, Stuck Tutorial, dan Stuck Loker akan membantu teman-teman dalam menyelesaikan permasalahan seputar pemrograman. Membangun developer-developer handal di masa di masa depan.</p>
          <h5 class="my-3 font-weight-bold">Kenapa dinamakan unStuckInAja?</h5>
          <p>Kita biasa menyebut keadaan dimana saat kita memiliki suatu permasalahan dan buntu akan solusinya, kita sering bilang, <i>"lagi stuck nih"</i> maka dari itulah untuk menjawab pertanyaan itu, <i>unStuckInAja</i></p>
          <h5 class="my-3 font-weight-bold">Siapa di balik unStuckInAja?</h5>
          <p><b>unStuckInAja</b> dibuat oleh dua orang mahasiswa Telkom University, Prodi D3 Teknik Informatika angkatan 2017. Keduanya adalah Fadli Hidayatullah dan Laras Nurhayatunnufus. unStuckInAja dibuat pada tahun 2018, dan dirilis pada bulan Mei 2018</p>
				</div>

        <!--kanan-->
        <div class="col-md-6 my-4">
          <h2 class="pb-3 font-weight-bold">Kontak Kami</h2>
          <div class="rounded p-3 content shadow">
            <form method="POST">   
              <table class="table table-polos">
                <tr>
                  <td>
                    <input type="text" name="nama" class="form-control-sm form-control" placeholder="Nama Lengkap">
                  </td>
                  <td>
                  <input type="text" name="email" class="form-control-sm form-control" placeholder="Alamat Email">
                  </td>
                </tr>
                <tr>
                  <td colspan="2">
                    <textarea name="saran" rows="8"class="motto form-control" placeholder="Saran atau pertanyaan"></textarea>
                  </td>
                </tr>
                <tr>
                  <td colspan="2">
                    <button type="submit" class="btn btn-input rounded text-white float-right shadow px-4" name="kirim">Kirim</button>
                  </td>
                </tr>
              </table>
            </form>
            <?php
              $connect = new mysqli("localhost","root","ngopi","unstuckinaja");
              if (isset($_POST['kirim'])) {
                $nama = $_POST['nama'];
                $email = $_POST['email'];
                $saran = $_POST['saran'];

                $query=$connect->query("INSERT INTO SARAN VALUES('','$nama','$email','$saran')");
                if ($query) {
            ?>
            <div class="alert alert-success" role="alert">
              This is a success alert—check it out!
            </div>
            <?php
                }else{
            ?>
            <div class="alert alert-danger" role="alert">
              This is a danger alert—check it out!
            </div>
            <?php
                }
              }
            ?>
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
