<?php 
require_once '../model/model.php';

if ( isset($_GET['id']) && isset($_POST['update'])) {

  $stuckId=$_GET['id'];
    $sql = 
  "UPDATE stuck SET title='title', detail='detail', tagId='tagId' WHERE stuckId='stuckId'";
  $params = [
    ':title' => $_POST['title'],
    ':detail' => $_POST['detail'],
    ':tagId' => $_POST['tag'],
    ':stuckId' => $stuckId
  ];
  
  $status = crud($sql, $params);
  if ($status) {
    header('location:'.$_SERVER['PHP_SELF'] . '?id=' . $stuckId);
  } else {
    header('location: '.$_SERVER['PHP_SELF'] . '?id='. $stuckId. '&error=update_failed');
  }

}