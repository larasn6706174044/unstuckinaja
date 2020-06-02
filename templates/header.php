

<div class="navbar fixed-top navbar-hb navbar-expand-md navbar-light bg-light">

<div class="container">

  <div class="navbar-brand">
      <a href="<?=BASE_URL?>">
          <img src="<?=BASE_URL."assets/img/logo.png"?>" width="60px">
      </a>
  </div>
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menuKita">
        <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="menuKita">

      <ul class="navbar-nav nav-li-hb mr-auto">
          <li>
              <a class="nav-link" href="<?=BASE_URL."stuckcoding/"?>">StuckCoding</a>
          </li>

          <li>
              <a class="nav-link" href="<?=BASE_URL."stuckloker/"?>">StuckLoker</a>
          </li>

          <li>
              <a class="nav-link" href="<?=BASE_URL."stucktutorial/"?>">StuckTutorial</a>
          </li>

          <li>
              <a class="nav-link" href="<?=BASE_URL."unstucker/"?>">unStuckers</a>
          </li>
          <li>
            <form method="get" class="form-group" action="search/keyword.php">
                <input type="text"  name="keyword" class="form-control form-control-sm form-control-hb" placeholder="Cari dulu lah..." >
            </form>
          </li>
      </ul>

      <?php
        if ( isset($_SESSION["userNim"]) ) {
          ?>

        <div class="dropdown show ml-auto">

            <a class="base-text-color btn-sm dropdown-toggle" href="profile.php" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img src="<?=BASE_URL."profile/uploads/".$userData["photo"]?>" class="img-circle" style="width:20px; height:20px;"> <?=$userData["username"]?>
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item btn-sm" href="<?=BASE_URL."profile/"?>">Lihat Profil</a>
                <a class="dropdown-item btn-sm" href="<?=BASE_URL."profile/edit_profile.php"?>">Edit Profil</a>
                <a class="dropdown-item btn-sm" href="<?=BASE_URL."logout.php"?>">Keluar</a>
            </div>
        </div>

    </div>
    <?php
      }else {
      ?>

        <form class="form-inline float-right">
          <a href="login/" class="font-weight-normal mr-3">Masuk</a>
          <a href="daftar/" class="btn btn-sm btn-custom pl-3 pr-3 text-white">Daftar</a>
        </form>

      <?php
      } // akhir if
      ?>

  </div>
</div>
</div>
