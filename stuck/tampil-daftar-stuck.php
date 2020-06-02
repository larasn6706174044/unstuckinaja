<?php 

function display_stuck( $sort_type ) {

  // siapkan query
  $sql = "
    FROM stuck s
    INNER JOIN member m
    ON s.nim = m.nim
    INNER JOIN tag t
    ON s.tagId = t.tagId 
  ";
  
  switch ( $sort_type ) {

    case 'recent':
      $sql .= " 
      ORDER BY s.editDate DESC, s.views DESC
      LIMIT 10
      ";
      break;
      
    case 'trending':
        $sql .= " 
        ORDER BY s.editDate DESC
        LIMIT 10
        ";
        break;

    case 'top':
    case 'top-homepage':
      $sql = "
      SELECT s.stuckId, s.title, s.editDate, s.votes, s.views, COUNT(c.commentId) 'jumlah_komentar', m.username, t.keterangan
      FROM stuck s
      LEFT JOIN comments c
      ON (c.stuckId = s.stuckId)
      INNER JOIN member m
      ON (s.nim = m.nim)
      INNER JOIN tag t
      ON s.tagId = t.tagId
      GROUP BY s.stuckId
      ORDER BY jumlah_komentar DESC, s.votes DESC, s.views DESC
      LIMIT 10
      ";
      break;
    
      
  }
      
  // eksekusi
  $result_set = selectAll($sql, []);

  // tampilkan
  for ($i = 0; $i < count($result_set); $i++) {

    $stuckId = $result_set[$i]['stuckId'];
    $title = $result_set[$i]['title'];
    $username = $result_set[$i]['username'];
    $votes = $result_set[$i]['votes'];
    $views = $result_set[$i]['views'];
    $editDate = $result_set[$i]['editDate'];
    $tag = $result_set[$i]['keterangan'];

    $sql_comment = "SELECT COUNT(*) 'jumlah' FROM comments WHERE stuckId = :stuckId";
    $params = [
      ':stuckId' => $stuckId,
    ];

    $result_set_comments = select($sql_comment, $params);

    $jumlah_komentar = $result_set_comments['jumlah'];
    
    if ( $sort_type === 'top-homepage') {
    ?>
    
      <div class="card card-custom mt-3 content shadow">
        <div class="card-body">
          <div class="row mx-3">
            <div class="component row col-md-3 order-2 order-md-1 col-12 justify-content-center text-center px-0 mr-2">
              <div class="col-sm-2 col-4 p-1 p-md-0 col-md-4">
                <div class="row-title">
                  <p>votes</p>
                </div>
                <div class="row-desc">
                  <h6><?=$votes ?></h6>
                </div>
              </div>
              <div class="col-sm-2 col-4 p-1 p-md-0 col-md-4">
                <div class="row-title">
                  <p>answers</p>
                </div>
                <div class="row-desc">
                  <h6><?=$jumlah_komentar ?></h6>
                </div>
              </div>
              <div class="col-sm-2 col-4 p-1 p-md-0 col-md-4">
                <div class="row-title">
                  <p>views</p>
                </div>
                <div class="row-desc">
                  <h6><?=$views ?></h6>
                </div>
              </div>
            </div>
            <div class="component col-12 order-1 order-md-2 col-md-9 row">
              <div>
                <a href="stuck/stuck.php?id=<?=$stuckId ?>" class="text-dark"><h5><?=$title ?></h5></a>
                <small class="text-muted">ditanya <?=$editDate ?> oleh
                  <a class="important-color mx-2" href="#"><?=$username ?></a>
                </small>
              </div>
              <div class="col-md-12 text-left p-0 mt-1 mb-2 ">
                <small class="border rounded p-1"><a href="#" class="text-muted"><?= $tag ?></a></small>
              </div>
            </div>
          </div>
        </div>
      </div>					

    <?php 

    } else {
    ?>
      
      <div class="card mt-3 content shadow p-3 card-custom">
  
        <div class="row col-md-12">
          <a href="../stuck/stuck.php?id=<?=$stuckId?>" class="text-dark">
            <h7><?=$title?></h7>
          </a>
  
          <p class="no-margin keterangan text-muted">ditanya <?=$editDate?> oleh
          <a class="important-color ml-2" href="#"><?=$username?></a>
          </p>
  
          <div class="col-md-12 text-left p-0 mt-1 mb-2 ">
            <small class="border rounded p-1"><a href="#" class="text-muted"><?=$tag?></a></small>
          </div>
  
          <div class="component row col-md-12 col-2">
            <div class="col-12 col-md-2">
              <div class="row row-title text-center">
                <small>votes</small>
              </div>
              <div class="row row-desc">
                <h7><?=$votes?></h7>
              </div>
            </div>
  
            <div class="col-12 col-md-2">
              <div class="row row-title text-center">
                <small>answers</small>
              </div>
              <div class="row row-desc">
                <h7><?=$jumlah_komentar?></h7>
              </div>
            </div>
  
            <div class="col-12 col-md-2">
              <div class="row row-title text-center">
                <small>views</small>
              </div>
              <div class="row row-desc">
                <h7><?=$views?></h7>
              </div>
            </div>
          </div>
  
        </div>
      </div>

    <?php 
    }

  }

}
?>