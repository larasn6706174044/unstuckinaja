<?php 

function isLiked($commentId, $nim) {

  $sql = "SELECT * FROM votecomment WHERE commentId=:commentId AND nim=:nim";

  $params = [
    ":commentId" => $commentId,
    ":nim" => $nim
  ];
  
  $row = select($sql, $params);
  if ($row !== false)
    return true;
  else 
    return false;
}
  
?>