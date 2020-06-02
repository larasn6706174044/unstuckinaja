<?php

session_start();

require_once "../../model/model.php";
require_once "../../helper.php";

$isLogin = isset($_POST["login"]);

if (!$isLogin) {
  header("location: ".BASE_URL."login/");
  exit;
}

// ===================================
// AMBIL DAN FILTER DATA
// ===================================
$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
$password = trim($_POST["password"]);

// ===================================
// VALIDASI INPUT KOSONG
// ===================================
if ( empty($username) || empty($password) ) {
  $_SESSION["statusLogin"] = "emptyInput";
  header("location: ".BASE_URL."login/");
  exit;
}

// ===================================
// PERIKSA AKUN
// ===================================
$sql = "SELECT * FROM member WHERE username=:username OR nim=:nim";

$params = [
  ":username" => $username,
  ":nim" => $username
];

$row = select($sql, $params);

if ( $row && password_verify($password, $row["password"]) ) {
  
  $_SESSION["userNim"] = $row["nim"];
  $_SESSION["statusLogin"] = "success";
  
  header("location: ".BASE_URL."login/");
  exit;
  
} else {
  
    $_SESSION["statusLogin"] = "failed";
    header("location: ".BASE_URL."login/");
    exit;
  
}