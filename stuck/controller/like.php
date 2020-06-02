<?php 

require_once "../../model/model.php";

if ( isset($_POST["data"]) ) {

  $data = json_decode($_POST["data"]);

  $commentId = $data->commentId;
  $nim = $data->nim;

  $sql = "SELECT * FROM votecomment WHERE commentId=:commentId AND nim=:nim";
  
  $params = [
    ":commentId" => $commentId,
    ":nim" => $nim
  ];

  $row = select($sql, $params);

  if ($row === false) {

    $sql = "INSERT INTO votecomment VALUES (NULL, :commentId, :nim)";

    $status = crud($sql, $params);
    if ($status === true) 
      echo "liked";

  } else {
    
    $sql = "DELETE FROM votecomment WHERE commentId=:commentId AND nim=:nim";
    
    $status = crud($sql, $params);
    if ($status === true)
      echo "unlike";

  }
  
}
