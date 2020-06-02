<?php 

require_once "./../../auth.php";
require_once "./../../model/model.php";

$isUpdateUsername = isset($_POST["updateUsername"]);

if (!$isUpdateUsername) {
  header("location: ./../edit_account.php");
  exit;
}

// ===================================
// ambil input
// ===================================
$oldUsername = filter_input(INPUT_POST, "old", FILTER_SANITIZE_STRING);
$newUsername = filter_input(INPUT_POST, "new", FILTER_SANITIZE_STRING);
$password = $_POST["password"];


// ===================================
// VALIDASI INPUT KOSONG
// ===================================
if ( empty($oldUsername) || empty($newUsername) || empty($password) ) {
  $_SESSION["statusUpdateUsername"] = "emptyInput"; 
  header("location: ./../edit_account.php");
  exit;
}

// ===================================
// VALIDASI USERNAME ATAU PASSWORD TIDAK SESUAI
// ===================================
$nim = $_SESSION["userNim"];

$checkUsername = ($oldUsername === $_SESSION["userData"]["username"]);

$sql = "SELECT * FROM member WHERE nim=:nim";
$params = [":nim" => $nim];
$row = select($sql, $params);

$checkPassword = password_verify($password, $row["password"]);

if ( $checkUsername === false || $checkPassword === false ) {
  $_SESSION["statusUpdateUsername"] = "invalidAccount"; 
  header("location: ./../edit_account.php");
  exit;
}

// ===================================
// VALIDASI USERNAME TELAH DIGUNAKAN
// ===================================
$sql = "SELECT username FROM member WHERE username=:username";
$params = [":username" => $newUsername];
$row = select($sql, $params);

if ( $row !== false ) {
  $_SESSION["statusUpdateUsername"] = "usernameAlreadyUsed"; 
  header("location: ./../edit_account.php");
  exit;  
}

// ===================================
// PERBARUI USERNAME
// ===================================
$sql = "UPDATE member SET username=:username WHERE nim=:nim";
$params = [
  ":username" => $newUsername,
  ":nim" => $nim
];

$status = crud($sql, $params);

if ($status === true) {
  $_SESSION["userData"]["username"] = $newUsername;
  $_SESSION["statusUpdateUsername"] = "success"; 
} else {
  $_SESSION["statusUpdateUsername"] = "failed"; 
}

header("location: ./../edit_account.php");
exit;  
