<?php 

require_once "./../../auth.php";
require_once "./../../model/model.php";

$isUpdatePassword = isset($_POST["updatePassword"]);

if (!$isUpdatePassword) {
  header("location: ./../edit_account.php");
  exit;
}

// ===================================
// AMBIL INPUT
// ===================================
$oldPassword = $_POST["old"];
$newPassword = $_POST["new"];
$confirmPassword = $_POST["confirm"];

// ===================================
// VALIDASI INPUT KOSONG DAN INPUT KURANG
// ===================================
if ( empty($oldPassword) || empty($newPassword) || empty($confirmPassword) ) {

  $_SESSION["statusUpdatePassword"] = "emptyInput"; 
  header("location: ./../edit_account.php");
  exit;
  
}

$nim = $_SESSION["userNim"];


// ===================================
// COCOKKAN PASSWORD DAN KONFIRMASI PASSWORD
// ===================================
$isPasswordMatch = ($newPassword === $confirmPassword);

if (!$isPasswordMatch) {
  
  $_SESSION["statusUpdatePassword"] = "passwordMismatch"; 
  header("location: ./../edit_account.php");
  exit;
  
}

// ===================================
// CHECK PASSWORD LAMA
// ===================================
$sql = "SELECT * FROM member WHERE nim=:nim";
$params = [":nim" => $nim];
$row = select($sql, $params);

$isPassword = password_verify($oldPassword, $row["password"]);

if (!$isPassword) {
  
  $_SESSION["statusUpdatePassword"] = "invalidPassword"; 
  header("location: ./../edit_account.php");
  exit;
  
}

// ===================================
// PERBARUI PASSWORD
// ===================================
$newPassword = password_hash($newPassword, PASSWORD_DEFAULT);

$sql = "UPDATE member SET password=:password WHERE nim=:nim";

$params = [
  ":password" => $newPassword,
  ":nim" => $nim
];

$status = crud($sql, $params);

if ($status === true) 
  $_SESSION["statusUpdatePassword"] = "success"; 
else
  $_SESSION["statusUpdatePassword"] = "failed"; 

header("location: ./../edit_account.php");
exit;  
