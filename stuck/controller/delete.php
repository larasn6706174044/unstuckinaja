<?php 

require_once "./../../auth.php";
require_once "./../../helper.php";
require_once "./../../model/model.php";

$isHapusClicked = isset($_GET["id"]);

if (!$isHapusClicked) {
  header("location: ".BASE_URL);
}

$stuckId = $_GET["id"];

// ===================================
// hapus
// ===================================
$sql = "DELETE FROM stuck WHERE stuckId=:stuckId";
$params = [":stuckId" => $stuckId];

$status = crud($sql, $params);

if ($status === true)
  $_SESSION["statusStuck"] = "success";
else 
  $_SESSION["statusStuck"] = "failed";


header("location: ".BASE_URL."profile/");
