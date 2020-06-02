<?php
// ===================================
// workflow reload history
// - select semua stuck yang memiliki nim bersangkutan
// - tampilkan ke history
// ===================================

require_once '../model/model.php';
require_once '../helper.php';

function loadHistory() {

  global $nim;

$sql = "
SELECT s.stuckId, s.title, s.editDate, s.votes, s.views, t.tagId, t.keterangan, COUNT(c.commentId) 'jumlahKomentar', m.username, t.keterangan
FROM stuck s
LEFT JOIN comments c
ON (c.stuckId = s.stuckId)
INNER JOIN member m
ON (s.nim = m.nim)
INNER JOIN tag t
ON s.tagId = t.tagId
WHERE m.nim=:nim
GROUP BY s.stuckId
ORDER BY s.editDate DESC
";

  $params = [':nim' => $nim];

  $rows = selectAll($sql, $params);

  return $rows;

}

function loadViewHistory() {

  $rows = loadHistory();

  for ($i = 0; $i < count($rows); $i++) {

    $sql = "SELECT COUNT(voteStuckId) 'votes' FROM votestuck WHERE stuckId=:stuckId GROUP BY (stuckId)";
    $params = [":stuckId" => $rows[$i]['stuckId']];

    $votes = select($sql, $params);

    if ($votes === false) {
      $votes["votes"] = 0;
    }

    ?>

    <div class="col-md-6 mb-2">
      <div class="card mt-3 shadow">
        <div class="card-body">

          <h5 class="card-title" style="width: 80%">
            <a class="text-dark" href="<?=BASE_URL."stuck/stuck.php?id=".$rows[$i]['stuckId']?>"><?=$rows[$i]['title']?></a>
          </h5>

          <p class="m-0">
            <small class="text-muted">
              ditanya <?=$rows[$i]["editDate"]?> oleh
              <a class="base-text-color ml-2" href="<?=BASE_URL."user/".$rows[$i]["username"]?>"><?=$rows[$i]["username"]?></a>
              <a href="<?=BASE_URL."stuck/tag/".$rows[$i]["tagId"]?>" class="tag btn btn-outline-secondary btn-sm ml-2"><?=$rows[$i]["keterangan"]?></a>
            </small>
          </p>

          <div class="row mt-2">

            <div class="col-4">
              <div class="statistic bg-light-grey">
                <div class="stat-title  p-2 rounded">
                  <small class="text-left">votes</small> <span class="stat-number text-center"><?=$votes["votes"]?></span>
                </div>
              </div>
            </div>

            <div class="col-4">
              <div class="statistic bg-light-grey">
                <div class="stat-title  p-2 rounded">
                  <small class="text-left">answers</small> <span class="stat-number text-center"><?=$rows[$i]['jumlahKomentar']?></span>
                </div>
              </div>
            </div>

            <div class="col-4">
              <div class="statistic bg-light-grey">
                <div class="stat-title  p-2 rounded">
                  <small class="text-left">views</small> <span class="stat-number text-center"><?=$rows[$i]['views']?></span>
                </div>
              </div>
            </div>

          </div>

        </div>
      </div>
    </div>

    <?php
  }

}
