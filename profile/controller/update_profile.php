<?php 

require_once "./../../auth.php";
require_once "./../../model/model.php";

$isUpdate = isset($_POST["update"]);

if (!$isUpdate) {
  header("location: ../edit_profile.php");
  exit;
}

$nim = $_SESSION["userNim"];

// ===================================
// AMBIL USER INPUT 
// ===================================
$nama = filter_input(INPUT_POST, "nama", FILTER_SANITIZE_STRING);
$motto = filter_input(INPUT_POST, "motto", FILTER_SANITIZE_STRING);
$bio = filter_input(INPUT_POST, "bio", FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
$github = filter_input(INPUT_POST, "github", FILTER_SANITIZE_STRING);
$twitter = filter_input(INPUT_POST, "twitter", FILTER_SANITIZE_STRING);
$siteUrl = filter_input(INPUT_POST, "siteURL", FILTER_SANITIZE_URL); 

// ===================================
// VALIDASI INPUT KOSONG
// ===================================
if ( empty($nama) ) {
  $_SESSION["statusUpdateProfile"] = "emptyInput"; 
  header("location: ../edit_profile.php");
  exit;
}

// ===================================
// VALIDASI EMAIL DAN URL
// ===================================
if ( filter_var($siteUrl, FILTER_VALIDATE_URL) === false && $siteUrl != '') {
  $_SESSION["statusUpdateProfile"] = "invalidURL"; 
  header("location: ./../edit_profile.php");
  exit;
}

if ( !filter_var($email, FILTER_VALIDATE_EMAIL) && $email != '') {
  $_SESSION["statusUpdateProfile"] = "invalidEmail"; 
  header("location: ./../edit_profile.php");
  exit;
}


// ===================================
// VALIDASI PHOTO
// ===================================
$photoName = $_SESSION["userData"]["photo"];
$targetDirectory = "../uploads/";

if ( $_FILES["photo"]["name"] !== "" ) {

  $extension = pathinfo($_FILES["photo"]["name"], PATHINFO_EXTENSION);
  $size = $_FILES["photo"]["size"];

  // ===================================
  // VALIDASI FORMAT PHOTO
  // ===================================
  $isValidExtension = ( $extension === "png" || $extension === "jpg" || $extension === "jpeg" || $extension === "gif" || $extension === "svg" );

  // ===================================
  // VALIDASI KEBENARAN GAMBAR
  // ===================================
  $isValidImage = getimagesize($_FILES["photo"]["tmp_name"]);

  if ( $isValidExtension === false || $isValidImage === false || ($size > 2000000) ) {
    $_SESSION["statusUpdateProfile"] = "invalidImage"; 
    header("location: ./../edit_profile.php");
    exit;
  }

  // HAPUS FILE SEBELUMNYA
  if ( file_exists($targetDirectory.$photoName) === true ) {
    unlink($targetDirectory.$photoName);
  }

  $photoName = $nim.".".$extension;
  $upload = $targetDirectory . $photoName;
    
  $status = move_uploaded_file($_FILES["photo"]["tmp_name"], $upload);
}

// ===================================
// UPDATE PROFILE
// ===================================
$sql = "UPDATE member SET nama=:nama, photo=:photo, motto=:motto, bio=:bio, email=:email, github=:github, twitter=:twitter, siteUrl=:siteUrl WHERE nim=:nim";

$params = [
  ":nama" => $nama,
  ":photo" => $photoName,
  ":motto" => $motto,
  ":bio" => $bio,
  ":email" => $email,
  ":github" => $github,
  ":twitter" => $twitter,
  ":siteUrl" => $siteUrl,
  ":nim" => $nim
];

$status = crud($sql, $params);

if ($status === true) {
  $_SESSION["statusUpdateProfile"] = "success"; 
  
} else {
  $_SESSION["statusUpdateProfile"] = "failed"; 
}

header("location: ./../edit_profile.php");
exit;  
