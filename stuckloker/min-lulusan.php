<?php
	$connect = new mysqli("localhost","root","ngopi","unstuckinaja");
  $q=$_GET['q'];
  if ($q=="default") {
    $query = mysqli_query($connect,"SELECT * FROM loker"); 
  }else{
  $query = mysqli_query($connect,"SELECT * FROM loker WHERE minLulusan='$q'"); 
  }
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