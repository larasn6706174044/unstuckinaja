<?php
require_once "./../helper.php";
require_once "./controller/get_detail_stuck.php";
require_once "./controller/update-view.php";
require_once "./controller/tampil_tags.php";
require_once "./controller/checkVote.php";
require_once "controller/display_comments.php";
require_once "../profile/controller/get_profile.php";

function isLogin() {
  return isset($_SESSION['userNim']);
}

if (isLogin()) {
  $nim = $_SESSION["userNim"];
  $userData = getDataProfile($nim);
}

$stuckDetail = getDetailStuck();

updateViewCount();

$stuckDetail["views"] = ((int) $stuckDetail["views"]) + 1;

$stuckId = $_GET["id"];
$_SESSION["stuckId"] = $stuckId;

?>

<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?=$stuckDetail["title"] ?> | unStuckInAja!</title>

  <!-- LOAD STYLESHEETS DISINI -->
	<link rel="shortcut icon" type="images/x-icon" href="<?=BASE_URL."assets/img/favicon.png"?>">

	<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i" rel="stylesheet">

  <link rel="stylesheet" href="<?=BASE_URL."assets/css/bootstrap.min.css"?>">

  <link rel="stylesheet" href="<?=BASE_URL."assets/css/style.css"?>">

	<link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet">

  <link rel="stylesheet" href="<?=BASE_URL?>assets/highlightjs/styles/default.css">

	<script src="<?=BASE_URL."assets/js/ckeditor/ckeditor.js"?>"></script>

</head>

<body

  <!-- LOAD HEADER -->
  <?php include_once "../templates/header.php" ?>

  <div class="container mt-5 stuck-padding">

    <div class="row mb-2">

      <!-- MAIN CONTENT -->
      <div class="col-md-8">

        <!-- PROFIL USER -->
        <div class="row mb-2">

          <div class="col-md-12">
            <div class="profile">
              <img src="<?=BASE_URL."profile/uploads/".$stuckDetail["photo"]?>" class="rounded-circle shadow float-left" style="width:32px;">

              <p class="text-muted m-0 float-left ml-2">
                <small>ditanya oleh : <a href="" class="base-text-color"><?=$stuckDetail["username"]?></a></small>
              </p>

              <?php
                if ( isStuckOwner() === true ) {
              ?>
                <div class="action float-left ml-2">
                  <div class="btn-group" role="group">
                    <button type="buttodn" class="btn btn-sm btn-outline-secondary m-0">Edit</button>
                    <button type="button" id="hapus" class="btn ml-1 btn-sm btn-outline-danger m-0">Hapus</button>
                  </div>
                </div>

              <?php
                }
              ?>

            </div>
          </div>

        </div> <!-- AKHIR DARI PROFIL USER -->

        <!-- OVERVIEW STUCK -->
        <div class="row">

          <div class="col-md-12">
            <h2 class="mb-0"><?=$stuckDetail["title"]?>
              <?php
                if ( isStuckOwner() === false ) {
              ?>
                <button class="btn btn-sm btn-outline-primary" id="vote">vote stuck ini</button>
              <?php
                }

                $isVoted = isVoted();

                if ($isVoted === true) {
                  ?>
                  <script>
                    var btnVote = document.getElementById("vote");
                    btnVote.innerHTML = "unvote";
                    btnVote.classList.remove("btn-outline-primary ");
                  </script>
                  <?php
                }

              ?>
            </h2>
            <p class="m-0 text-muted">
              <small>Terakhir di update : <?=date('l, j F Y', strtotime($stuckDetail["editDate"]))?></small>
            </p>
          </div>

          <div class="col-md-12">
            <div class="statistic-box d-flex mt-2">

                <div class="statistic-lite bg-light-grey">
                  <div class="stat-title p-2 rounded">
                    <small class="text-left">votes</small> <span class="stat-number text-center" id="jumlahVotes"><?=$stuckDetail["votes"]?></span>
                  </div>
                </div>

                <div class="statistic-lite bg-light-grey ml-4">
                  <div class="stat-title p-2 rounded">
                    <small class="text-left">views</small> <span class="stat-number text-center"><?=$stuckDetail["views"]?></span>
                  </div>
                </div>

                <div class="statistic-lite bg-light-grey ml-4">
                  <div class="stat-title p-2 rounded">
                    <small class="text-left">answers</small> <span class="stat-number text-center"><?=$stuckDetail["comments"]?></span>
                  </div>
                </div>
              </div>

          </div>

        </div> <!-- AKHIR DARI OVERVIEW STUCK -->

        <hr>

        <!-- DETAIL STUCK -->
        <div class="row">

          <div class="col-md-12">
            <div class="detail">
              <?=$stuckDetail["detail"]?>
            </div>

            <div class="col-md-12">
              <?php
                if ( isStuckOwner() === false ) {
              ?>
                <button class="btn btn-sm btn-outline-primary" id="vote">vote</button>
              <?php
                }

                  $isVoted = isVoted();

                  if ($isVoted === true) {
                    ?>
                    <script>
                      var btnVote = document.getElementById("vote");
                      btnVote.innerHTML = "unvote";
                      btnVote.classList.remove("btn-outline-primary ");
                    </script>
                    <?php
                  }

                ?>
            </div>
          </div>

        </div> <!-- AKHIR DARI DETAIL STUCK -->

      </div> <!-- AKHIR DARI KOLOM MAIN KONTEN -->

      <div class="col-md-4">

      </div> <!-- SIDEBAR -->

    </div>

  </div>


</head>

  <body>


  </div>
          <div id="comments">
            <h4>Komentar</h4>

            <?php
              $isLogin = isLogin();

              if ($isLogin === true) {
                ?>
                  <form action="controller/insertComment.php" method="POST">
                    <textarea class="ckeditor u-full-width" name="komentar" required></textarea>
                    <button class="button-primary" name="submitKomentar">Post Komentar</button>
                  </form>

                  <!--
                  <div class="sorting">
                    <label for="sort">Urutkan berdasarkan :</label>
                    <select id="sort" class="u-full-width">
                      <option value="date">Berdasarkan Terbaru</option>
                      <option value="top">Berdasarkan Jumlah Vote</option>
                    </select>
                  </div>
                  -->
                <?php
              } else {
                echo "<p>Anda harus login terlebih dahulu untuk berkomentar.</p>";
              }
              ?>

              <div id="commentList">
                <?=displayComments() ?>
              </div>
          </div>

        </div>

        <?php
          if ( isStuckOwner() === true ) {
          ?>
            <div class="five columns">

              <h4>Input Stuck</h4>

              <form action="./controller/update.php" method="POST">

                <label for="title">Judul Stuck</label>
                <input class="u-full-width" type="text" id="title" name="title" value="<?=$stuckDetail['title']?>" required>

                <label for="detail">Detail</label>
                <textarea class="ckeditor u-full-width" id="detail" name="detail" required><?=$stuckDetail['detail']?></textarea>

                <br>
                <label for="tag">Pilih Tag</label>
                <select id="tag" name="tag" class="u-full-width">
                  <?=loadViewTags($stuckDetail["tagId"]);?>
                </select>

                <button class="u-full-width button-primary" name="update">Update Stuck</button>
              </form>

            </div>
          <?php
          }
          ?>
      </div>

    </div>

    <!-- load ckeditor -->
    <script src="<?=BASE_URL?>/assets/js/ckeditor/ckeditor.js"> </script>
    <script src="<?=BASE_URL?>assets/highlightjs/highlight.pack.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>

    <script>
      try {

        var stuckId = "<?php echo $stuckId ?>";
        var nim = "<?php echo $_SESSION['userNim'] ?>";
        var jumlahVotes = document.getElementById("jumlahVotes");

        // FUNGSI HAPUS STUCK
        var hapus = document.getElementById("hapus");
        hapus.addEventListener("click", function() {
          if ( confirm("Apakah Anda yakin ingin menghapus data ini?") ) {
            window.location.href = "controller/delete.php?id=" + stuckId;
          }
        });

      } catch (e) {

      } finally {

      }

    </script>

  </body>

</html>
