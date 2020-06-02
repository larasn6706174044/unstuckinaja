<?php 

require_once "./../../model/model.php";
require_once "../../auth.php";
require_once "../../helper.php";

$isSubmit = isset($_POST["submit"]);

if (!$isSubmit) {
  header("location: ./../../");
  exit;
}


// ===================================
// AMBIL DAN FILTER DATA
// ===================================
$nim = $_SESSION["userNim"];
$title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING);
$detail = $_POST["detail"];
$tagId = $_POST["tag"];
$editDate = date('Y-m-d H:i:s');

// ===================================
// VALIDASI INPUT KOSONG
// ===================================
if ( empty($title) || empty($detail) || $tagId === "null" ) {
  $_SESSION["statusStuck"] = "emptyInput";
  header("location:".BASE_URL."profile/");
  exit;
}

// ===================================
// SUBMIT STUCK
// ===================================
$sql = "INSERT INTO stuck (title, detail, editDate, tagId, nim) VALUES (:title, :detail, :editDate, :tagId, :nim)";
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