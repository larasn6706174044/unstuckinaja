<?php 

session_start();

require_once "../../model/model.php";
require_once "../../helper.php";

$isDaftar = isset($_POST["daftar"]);

if (!$isDaftar) {
  header("location:".BASE_URL."daftar/");
  exit;
}

// ===================================
// AMBIL DAN FILTER DATA
// ===================================
$nim = filter_input(INPUT_POST, "nim", FILTER_SANITIZE_STRING);
$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
$nama = filter_input(INPUT_POST, "nama", FILTER_SANITIZE_STRING);
$password = trim($_POST["password"]);

// ===================================
// VALIDASI INPUT KOSONG
// ===================================
if ( empty($nim) || empty($username) || empty($nama) || empty($password) ) {
  $_SESSION["statusDaftar"] = "emptyInput";
  header("location: ".BASE_URL."daftar/");
  exit;
}

// ENKRIPSI PASSWORD
$password = password_hash($_POST["password"], PASSWORD_DEFAULT);

// ===================================
// PERIKSA APAKAH AKUN TELAH TERDAFTAR ATAU BELUM
// ===================================
$sql = "SELECT * FROM member WHERE nim=:nim";

$params = [
  ":nim" => $nim

];
$row = select($sql, $params);

if ($row && $row["username"] != null) {
  header("location: ".BASE_URL."daftar/");
  $_SESSION["statusDaftar"] = "registeredAccount";
  header("location: ".BASE_URL."daftar/");
  exit;
}

// ===================================
// PERIKSA APAKAH NIM TERDAFTAR
// ===================================
$sql = "SELECT * FROM member WHERE nim=:nim";

$params = [
  ":nim"=>$nim
];

$row = select($sql, $params);

if(!$row) {
  $_SESSION["statusDaftar"] = "nimNotFound";
  header("location: ".BASE_URL."daftar/");
  exit;
}


// ===================================
// PERIKSA APAKAH USERNAME TELAH DIGUNAKAN
// ===================================
$sql = "SELECT * FROM member WHERE username=:username";

$params = [
  ":username" => $username,
];

$row = select($sql, $params);

if ($row) {
  $_SESSION["statusDaftar"] = "usernameAlreadyUsed";
  header("location: ".BASE_URL."daftar/");
  exit;
}


// ===================================
// PROSES DAFTAR MEMBER
// ===================================
$sql = "UPDATE member SET nama=:nama, username=:username, password=:password WHERE nim=:nim";

$params = [
  ":nim" => $nim,
  ":nama" => $nama,
  ":username" => $username,
  ":password" => $password,
];

$status = crud($sql, $params);

if ($status === true) {
  $_SESSION["statusDaftar"] = "success";
  header("location: ".BASE_URL."daftar/");
  exit;
} else {
  $_SESSION["statusDaftar"] = "failed";
  header("location: ".BASE_URL."daftar/");
  exit;
}