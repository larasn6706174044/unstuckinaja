<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js" integrity="sha256-/BfiIkHlHoVihZdc6TFuj7MmJ0TWcWsMXkeDFwhi0zw=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/default.min.css" integrity="sha256-Zd1icfZ72UBmsId/mUcagrmN7IN5Qkrvh75ICHIQVTk=" crossorigin="anonymous" />
<script>hljs.initHighlightingOnLoad();</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha256-LA89z+k9fjgMKQ/kq4OO2Mrf8VltYml/VES+Rg0fh20=" crossorigin="anonymous" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<script type="text/javascript" src="../assets/js/popper.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha256-5+02zu5UULQkO7w1GIr6vftCgMfFdZcAHeDtFnKZsBs=" crossorigin="anonymous"></script>

<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>

<!-- load jquery-confirm js -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>

<body class="bg-light">
<div class="container mt-3">

<div class="row">

<div class="col-md-6">

<?php 
/*

# workflow lihat detail
- select stuck dengan id tersebut
- tampilkan detail stuck
- jika login tampilkan button edit dan delete
- tampilkan button tersebut jika stuck tersebut cocok dengan nim tersebut
- setiap kali load, maka view akan bertambah
*/

session_start();

require_once 'update-stuck.php';
if (isset($_GET['error'])) {
  $err = $_GET['error'];
  if ($err == 'update_failed') {
    ?>
    <div class="alert alert-danger">Terjadi kesalahan dalam meng-update</div>

    <?php
  }
}
if (isset($_GET['id'])) {
  
  require_once '../model/model.php';

  $stuckId = $_GET['id'];
  
  $sql = "SELECT * FROM stuck WHERE stuckId=:stuckId";
  $params = [':stuckId' => $stuckId];
  
  $result = select($sql, $params);

  $title = $result['title'];
  $editDate = $result['editDate'];
  $tagId = $result['tagId'];
  $detail = $result['detail'];
  $views = $result['views'] + 1;
  
  echo "<h2>{$title}</h2>";
  echo "<p><small class='text-muted'>edit date : {$editDate} | tag : {$tagId} | dilihat : {$views}</small></p>";

  if (isset($_SESSION['user_login'])) {
  
  // check apakah nim cocok dengan stuck id
    $sqlCheck = "SELECT * FROM stuck WHERE stuckId=:stuckId AND nim=:nim";

    $params = [
      ':stuckId' => $stuckId,
      ':nim' => $_SESSION['user_login']
    ];

    $resultSqlCheck = select($sqlCheck, $params);
    
    if ($resultSqlCheck) {
      echo '<button class="btn btn-sm btn-dark" name="inputStuck" data-toggle="modal" data-target="#inputStuck">Edit Stuck</button>';
      echo '<button id="hapus" class="btn btn-sm btn-danger ml-1">Hapus Stuck</button>';
    }      
    ?>

    <script>
    // pasang script alert disini
    $('#hapus').on('click', function () {

      $.confirm({
        title: 'Ini beneran?',
        theme: 'modern',
        content: 'Apakah kamu yakin ingin menghapus stuck ini?',
        type: 'orange',
        typeAnimated: true,
        buttons: {
            tryAgain: {
                text: 'Hapus',
                btnClass: 'btn-red',
                action: function(){
                  window.location = 'hapus-stuck.php?id=<?php echo $stuckId ?>';
                }
            },
            close: function () {
            }
        }
    });

    });

    if (confirm) {
      console.log('sdsd');
    }

    </script>
  
  <?php

  }
  
  echo "<hr>";
  echo "
  <p>
    {$detail}
  </p>";
  
  // update view
  $sqlUpdateView = "UPDATE stuck SET views = views + 1 WHERE stuckId=:stuckId";
  $params= [
    ':stuckId' => $stuckId
  ];

  crud($sqlUpdateView, $params);
    
}

?>

</div>

<div class="col-md-6"></div>

</div>

<div class="row mt-3">

<div class="col-md-6">
  <h3>Komentar</h3>
</div>
<div class="col-md-6"></div>

</div>

</div>

    <?php 
    ?>

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
					<form method="POST">
						<div class="modal-body">
							<input type="text" class="form-control" name="title" placeholder="Masukkan judul Stuck" value="<?php echo $title; ?>" required><br>
							
							<textarea class="ckeditor" id="ckedtor" name="detail" required>
                <?php echo $detail; ?>
              </textarea>
							<br/>
							<select class="custom-select" name="tag" required>
									<option value="false" selected>Pilih Tag</option>
									<?php 
										require_once '../stuck/tampil-tags.php';
										if (count($result) > 0) {
											for ($i = 0; $i < count($result); $i++) {
                        if ($result[$i]['tagId'] == $tagId) {

                          echo "
                            <option value='{$result[$i]['tagId']}' selected>
                              {$result[$i]['keterangan']}
                            </option>";
                            
                          } else {
                            
                            echo "
                              <option value='{$result[$i]['tagId']}'>
                                {$result[$i]['keterangan']}
                              </option>";
                            
                        }
											}
										}
									?>

								</select>
                
						</div>
						<!-- footer modal -->
						<div class="modal-footer">
							<button class="btn btn-secondary" name="update">Simpan</button>
					</form>
				</div>
			</div>
		</div>

</body>

