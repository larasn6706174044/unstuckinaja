<?php 
  require_once "./../helper.php";
  $tagId=$_GET['tagId'];
  $connect = new mysqli("localhost","root","ngopi","unstuckinajaa");
  $tampil = $connect->query("SELECT * FROM tag WHERE tagId='$tagId'");
	$query = $connect->query("SELECT s.stuckId, s.title, s.editDate, s.votes, s.views, t.tagId, t.keterangan, COUNT(c.commentId) 'jumlahKomentar', m.username, t.keterangan
	FROM stuck s
  LEFT JOIN comments c
  ON (c.stuckId = s.stuckId)
  INNER JOIN member m
  ON (s.nim = m.nim)
  INNER JOIN tag t
  ON s.tagId = t.tagId
  WHERE m.nim=s.nim AND t.tagId='$tagId'
  GROUP BY s.stuckId
  ORDER BY s.editDate DESC");

$count = $query->num_rows;
?>

<!DOCTYPE html>
<html>

<head>
  
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Pencarian | unStuckInAja!</title>

  <!-- LOAD STYLESHEETS DISINI -->
	<link rel="shortcut icon" type="images/x-icon" href="<?=BASE_URL."assets/img/favicon.png"?>">
	
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i" rel="stylesheet">

  <link rel="stylesheet" href="<?=BASE_URL."assets/css/bootstrap.min.css"?>">

	<link rel="stylesheet" href="<?=BASE_URL."assets/css/main.css"?>">

	<link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet">
	
	<script src="<?=BASE_URL."assets/js/ckeditor/ckeditor.js"?>"></script>

</head>

<body>
	
	<!-- LOAD HEADER -->
	<?php include_once "../templates/header.php";?>

	<div class="container mt-5 pt-2">

		<div class="row mt-4 mb-5">

			<!--kiri-->
			<div class="col-md-8">
			
				<div class="row">
					<div class="col-md-12">
						<h4 class=" font-weight-bold">Pencarian</h4>
						<hr>
						Ditemukan <?php echo $count?> jawaban dari kategori
            <b>
              <?php
                while ($r = $tampil->fetch_array()) {
                  echo $r['keterangan'];
              }
              ?>
            </b>
					</div>        
					
					
					<!-- HASIL PENCARIAN -->
					<?php
					while ($rows = $query->fetch_array()) {
					?>

					<div class="col-md-12 mb-2">
						<div class="card mt-3 shadow">
							<div class="card-body">

								<h5 class="card-title ml-0" style="width: 70%">
									<a class="text-dark" href="<?php echo "../stuck/stuck.php?id=".$rows['stuckId']?>"><?php echo $rows['title']?></a>
								</h5>

								<p class="m-0">
									<small class="text-muted">
										ditanya <?php echo $rows["editDate"]?> oleh
										<a class="base-text-color ml-2" href="<?php echo "user/".$rows["username"]?>"><?php echo $rows["username"]?></a>
										<a href="<?php echo "stuck/tag/".$rows["tagId"]?>" class="tag btn btn-outline-secondary btn-sm ml-2"><?php echo $rows["keterangan"]?></a>
									</small>
								</p>

								<div class="row mt-2">

									<div class="col-12 col-md-4">
										<div class="statistic bg-light-grey">
											<div class="stat-title  p-2 rounded">
												<small class="text-left">votes</small> <span class="stat-number text-center"><?php echo $rows["votes"]?></span>
											</div>
										</div>
									</div>

									<div class="col-12 col-md-4">
										<div class="statistic bg-light-grey">
											<div class="stat-title  p-2 rounded">
												<small class="text-left">answers</small> <span class="stat-number text-center"><?php echo $rows['jumlahKomentar']?></span>
											</div>
										</div>
									</div>

									<div class="col-12 col-md-4">
										<div class="statistic bg-light-grey">
											<div class="stat-title  p-2 rounded">
												<small class="text-left">views</small> <span class="stat-number text-center"><?php echo $rows['views']?></span>
											</div>
										</div>
									</div>

								</div>

							</div>
						</div>
					</div>

					<?php
						}
					?>
				</div>
			</div>

			<!--kanan-->
			<div class="offset-md-1 col-md-3">

					<!--stuckButton-->
					<div class="input-stuck my-4">
						<div class="header rounded-top py-2">
							<h5>
								Lagi Ngestuck?
							</h5>
						</div>
						<div class="content pt-4 pb-4 d-flex justify-content-center">
							<button type="button" class="btn btn-input rounded text-white" name="inputStuck" data-toggle="modal" data-target="#inputStuck">
								<i class="far fa-edit"></i> Kirim Stuck dulu lah
							</button>
						</div>
          </div>

          <!--stucktags-->
          <div class="input-stuck my-4">
						<div class="header rounded-top py-2">
							<h5>
								StuckTags
							</h5>
						</div>
						<div class="content py-4 text-center">
            <?php

              $query = $connect->query("SELECT * FROM  tag");
              while ($row = $query->fetch_array()) {
            ?>
              <a href="tag.php?tagId=<?php echo $row['tagId']; ?>" class="btn btn-outline-secondary btn-sm btn-sm-custom mr-1 mt-1"><?php echo $row['keterangan']; ?></a>
            <?php
              }
            ?>
						</div>
          </div>

          <!--stuckloker-->
          <div class="input-stuck my-4">
						<div class="header rounded-top py-2">
							<h5>
								nge-Stuck Loker?
							</h5>
            </div>
            <!--loker-->
            <?php
              $query2 = $connect->query("SELECT * FROM loker ORDER BY expDate ASC LIMIT 0,3");
              if ($query2->num_rows >0){
                while ($row = $query2->fetch_array()) {
            ?>
            <div class="content pt-3 text-center">
              <div class="row px-3">
                <!--nama loker-->
                <div class="col-md-12">
                  <a href="#">
                    <h6 class="font-weight-bold"><?php echo $row['title']; ?></h6>
                  </a>
                </div>
                <!--keterangan-->
                <div class="col-md-12 kecil">
                  <i class="fas fa-building pl-2"></i> <?php echo $row['perusahaan']; ?>
                  <i class="fas fa-map-marker pl-2"></i> <?php echo $row['lokasi']; ?>
                <i class="far fa-clock pl-2"></i> <?php echo $row['jamKerja']; ?>
                </div>
                <div class="col-md-12 pt-3">
                  <hr class="m-0">
                </div>
              </div>
            </div>
            <?php
                }
              }
            ?>
        
        </div>
		</div>

	</div>

	<!--modal input stuck-->
	<div class="modal fade" id="inputStuck" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Input Stuck-mu disini! </h5>
            <button type="button" class="close" data-dismiss="modal">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <!-- body modal -->
          <form>
            <div class="modal-body">
              <input type="text" class="form-control" name="judul-stuck" placeholder="Masukkan judul Stuck"><br>
              <textarea class="ckeditor" id="ckedtor" name="isi-stuck"></textarea>
              <br/>
              <select class="custom-select" name="tag-stuck">
                <option selected>Pilih Tag</option>
                <?php
                  $query = $connect->query("SELECT * FROM  tag");
                  while ($row = $query->fetch_array()) {
                ?>
                <option value="<?php echo $row['keterangan']; ?>"><?php echo $row['keterangan']; ?></option>

                <?php
                  }
                ?>
              </select>  
            </div>
            <!-- footer modal -->
            <div class="modal-footer">
              <button class="btn btn-secondary">Kirim</button>
            </div>
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