<?php 

require_once "../../model/model.php";
require_once "../../helper.php";
require_once "../../auth.php";

if ( ! isset($_GET["stuckId"])) {
  
  header("location".BASE_URL);
  exit;
}

$stuckId = $_GET["stuckId"];
$commentId = $_GET["commentId"];

$sql = "DELETE FROM comments WHERE commentId=:commentId";

$params = [
  ":commentId" => $commentId
];

$status = crud($sql, $params);
if ($status === true) {
  $url = "../stuck.php?id=".$stuckId;
  header("location: ".$url);
  exit;
}