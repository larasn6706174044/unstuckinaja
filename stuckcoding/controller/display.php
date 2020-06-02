<?php 

require_once "./../helper.php";
require_once "./../model/model.php";

function display($sortBy) {

  $sql = "
  SELECT s.stuckId, s.title, s.editDate, s.views, m.username, t.keterangan
  FROM stuck s
  INNER JOIN member m
  ON s.nim = m.nim
  INNER JOIN tag t
  ON s.tagId = t.tagId 
  ";

  $sql = "
  SELECT s.stuckId, s.title, s.editDate, s.views, COUNT(c.commentId) 'jumlah_komentar', m.username, t.keterangan
  FROM stuck s
  LEFT JOIN comments c
  ON (c.stuckId = s.stuckId)
  INNER JOIN member m
  ON (s.nim = m.nim)
  INNER JOIN tag t
  ON s.tagId = t.tagId
  GROUP BY s.stuckId";

  switch ($sortBy) {

    case "trending":
      $sql .= " ORDER BY s.editDate DESC, s.views DESC LIMIT 10";
      break;

    case "recent":
      $sql .= " ORDER BY s.editDate DESC LIMIT 10";
      break;
      
    case "top":
      $sql .= " ORDER BY jumlah_komentar DESC, s.views DESC
      LIMIT 10";
      break;
    
  }

  $rows = selectAll($sql, []);

  while ($r = $rows->fetch_assoc()) {
    
    // $sql = "SELECT COUNT(voteStuckId) 'votes' FROM votestuck WHERE stuckId=:stuckId GROUP BY (stuckId)";
    // $params = [":stuckId" => $rows[$i]["stuckId"]];

    // $votes = select($sql, $params);
    // $votes = $votes["votes"];
    // if ($votes === NULL)
      $votes = 0;
  ?>
    <div class="row">
    <div class="twelve columns card card-stuck">

    <a href="<?=BASE_URL?>stuck/stuck.php?id=<?=$r['stuckId']?>">
      <h4 class="stuck-title"> <?=$r["title"]?> </h4>
    </a>
    
    <small>Ditanya oleh : <a href=""><?=$r["username"]?></a></small>

    <br>

    <small class="bordered"><?=$r["keterangan"]?></small>

    <div class="inline">
      <p>
        <small>votes</small>  
        <br>
        <?=$votes?>
      </p>
      <p>
        <small>views</small>  
        <br>
        <?=$r["views"]?>
      </p>
      <p>
        <small>answers</small>  
        <br>
        <?=$r["jumlah_komentar"]?>
      </p>
    </div>
  
    <small>Edit Terakhir : <?=$r["editDate"]?></small>
    
  </div>
  </div>
  <?php
  }

  
}

?>