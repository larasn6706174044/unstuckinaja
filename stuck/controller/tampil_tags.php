<?php 
// ===================================
// workflow menampilkan tag pada input stuck
// - select semua kategori
// - tampilkan id nya ke select option 
// ===================================

require_once "../model/model.php";

function getTags() {
  
  $sql = "SELECT * FROM tag";

  $rows = selectAll($sql, []);

  return $rows;

}

function loadViewTags($selected = "") {

  $rows = getTags();

  for ($i = 0; $i < count($rows); $i++) {
    ?>
    <option value="<?=$rows[$i]['tagId']?>" <?php if ($rows[$i]['tagId'] === $selected) echo "selected" ?> >
      <?=$rows[$i]['keterangan']?>
    </option>
    <?php
  }
  
}

?>