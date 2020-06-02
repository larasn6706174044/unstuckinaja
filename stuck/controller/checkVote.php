<?php 

function isVoted() {

  if ( isset($_GET["id"]) && isset($_SESSION["userNim"]) ) {

    $stuckId = $_GET["id"];
    $nim = $_SESSION["userNim"];
    
    $sql = "SELECT * FROM votestuck WHERE stuckId=:stuckId AND nim=:nim";
  
    $params = [
      ":stuckId" => $stuckId,
      ":nim" => $nim
    ];
    
    $row = select($sql, $params);
  
    if ($row !== false)
      return true;
    else 
      return false;
  }
  
}

?>