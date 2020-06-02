<?php

require_once "./../../model/model.php";

if ( isset($_POST["data"]) ) {

  $data = json_decode($_POST["data"]);

  $stuckId = $data->stuckId;
  $nim = $data->nim;

  $sql = "SELECT * FROM votestuck WHERE stuckId=:stuckId AND nim=:nim";

  $params = [
    ":stuckId" => $stuckId,
    ":nim" => $nim
  ];

  $row = select($sql, $params);

  if ($row === false) {
    $sql = "INSERT INTO votestuck VALUES (NULL, :stuckId, :nim)";

    $status = crud($sql, $params);

    if ($status === true)
      echo "voted";
      
  } else {
    $sql = "DELETE FROM votestuck WHERE stuckId=:stuckId AND nim=:nim";

    $status = crud($sql, $params);
    if ($status === true)
      echo "unvoted";
  }

}
