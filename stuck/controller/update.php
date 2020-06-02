<?php 

require_once "./../../helper.php";
require_once "./../../model/model.php";
require_once "./../../auth.php";

$isUpdateClicked = isset($_POST["update"]);

if (!$isUpdateClicked) {

  header("location: ./../../");
  exit;
  
}

// ===================================
// get input
// ===================================
$nim = $_SESSION["userNim"];
$title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING);
$detail = $_POST["detail"];
$tagId = $_POST["tag"];
$editDate = date('Y-m-d H:i:s');

// ===================================
// validasi input kosong
// ===================================
if ( empty($title) || empty($detail) || empty($tagId) ) {

  $_SESSION["statusStuck"] = "emptyInput";
  header("location: ".BASE_URL);
  exit;

}

// ===================================
// update data stuck
// ===================================
$sql = "UPDATE stuck SET title=:title, detail=:detail, editDate=:editDate, tagId=:tagId WHERE nim=:nim";
$params = [
':title' => $title,
':detail' => $detail,
':editDate' => $editDate,
':tagId' => $tagId,
':nim' => $nim
];


$status = crud($sql, $params);

if ($status === true)
  $_SESSION["statusStuck"] = "success";
else 
  $_SESSION["statusStuck"] = "failed";


header("location: ".BASE_URL."profile/");


?>