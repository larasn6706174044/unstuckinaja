<?php 

// ===================================
// workflow load emblem
// - check apakah user pernah mendapatkan emblem pertama
// - check poin user == 100
// - jika >= 100
// - berikan emblem
// - jika sudah pernah mendapatkan emblem dengan id tersebut
// - lakukan lagi untuk emblem kedua, ketiga, dan seterusnya
// ===================================

require_once "../model/model.php";

// ===================================
// get emblem terakhir dan semua emblem user
// ===================================
function getUserEmblem() {

  global $nim;

  // ambil emblem terakhir dari user
  $sql = "
    SELECT ue.emblemId, e.namaEmblem, m.nim
    FROM useremblem ue
    INNER JOIN emblem e
    ON ue.emblemId = e.emblemId
    INNER JOIN member m
    ON ue.nim = m.nim
    WHERE m.nim=:nim ORDER BY e.emblemId DESC ";

  $params = [
    ":nim" => $nim
  ];

  $row = selectAll($sql, $params);

  return $row;  
}

function loadViewEmblem() {
  
  global $emblemList;

  // reverse karena sort by desc
  for ($i = (count($emblemList) - 1); $i >= 0; $i--) {
    ?>
      <div class="col-3 text-center">
        <i class="fas fa-code fa-2x" style="color: lightgrey;"></i>
        <p class="text-center mt-2">
        <p class="text-center mt-2">          <small class="font-weight-bold text-muted">
            <?=$emblemList[$i]["namaEmblem"]?>
          </small>
        </p>
      </div>

    <?php
  }

}

// ===================================
// get emblem data
// ===================================
function getEmblem() {

  $sql = "SELECT * FROM emblem";
  $row = selectAll($sql, []);
  
  return $row;
  
}

// ===================================
// set new emblem
// ===================================
function setNewEmblem() {

  global $nim, $points;
  
  $rowEmblem = getEmblem();
  $rowCount = count($rowEmblem);

  // ===================================
  // sql mendapatkan emblem user
  // ===================================
  $sqlGet = "SELECT * FROM useremblem WHERE emblemId=:emblemId AND nim=:nim";
  
  // ===================================
  // sql insert emblem baru
  // ===================================
  $sqlInsert = "INSERT INTO useremblem (emblemId, nim) VALUES (:emblemId, :nim)";

  $emblemName = null;
  $emblemCondition = null;
  
  for ($i = 0; $i < $rowCount; $i++) {

    $params = [
      ":nim" => $nim,
      ":emblemId" => $rowEmblem[$i]["emblemId"],
    ];

    $status = select($sqlGet, $params);

    switch ($i) {
      
      case 0:
        $emblemCondition = ($points >= 100 && $points < 200);
        $emblemName = $rowEmblem[$i]["namaEmblem"];
        break;
        
      case 1:
        $emblemCondition = ($points >= 200 && $points < 350);
        $emblemName = $rowEmblem[$i]["namaEmblem"];
        break;
        
      case 2:
        $emblemCondition = ($points >= 350 && $points < 500);
        $emblemName = $rowEmblem[$i]["namaEmblem"];
        break;
        
      case 3:
        $emblemCondition = ($points >= 500);
        $emblemName = $rowEmblem[$i]["namaEmblem"];
        break;
        
    }

    if ($status === false && $emblemCondition === true) {

      var_dump(crud($sqlInsert, $params));

      echo "Selamat kamu mendapatkan emblem " . $emblemName;

    }
    
  }
  
}
