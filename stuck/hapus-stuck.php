<?php 

require_once '../auth.php';
require_once '../model/model.php';

if (isset($_GET['id'])) {

  $stuckId = $_GET['id'];

  $sql = "DELETE FROM stuck WHERE stuckId=:stuckId";
  $params = [
    ':stuckId' => $stuckId
  ];

  if (crud($sql, $params)) {
    header('location: ../index.php');
  } else {
  }
  
}

?>