<?php 

require_once "../../model/model.php";
require_once "../../helper.php";
require_once "../../auth.php";
$isSubmitKomentar = isset($_POST["submitKomentar"]);

if (! $isSubmitKomentar) {
  header("location: ".BASE_URL);
  exit;
}

$komentar = $_POST["komentar"];
$editDate = date('Y-m-d H:i:s');
$stuckId = $_SESSION["stuckId"];
$nim = $_SESSION["userNim"];

if ($komentar === "") {

  $_SESSION["statusKomentar"] = "emptyInput";
  header("location: ".BASE_URL);
  exit;
}


$sql = "INSERT INTO comments VALUES (NULL, :komentar, :editDate, :stuckId, :nim)";
$params = [
":komentar" => $komentar,
":editDate" => $editDate,
":stuckId" => $stuckId,
":nim" => $nim
];

$status = crud($sql, $params);

if ($status === true) {
  $url = "../stuck.php?id=".$stuckId;
  header("location: ".$url);
  exit;
}