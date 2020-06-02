<?php 

require_once "./../model/model.php";

function updateViewCount() {

  if ( isset($_GET["id"]) ) {

    $stuckId = $_GET["id"];
    $sql = "UPDATE stuck SET views = views + 1 WHERE stuckId=:stuckId";
  
    $params = [":stuckId" => $stuckId ];
    
    crud($sql, $params);

  }

}

?>