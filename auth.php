<?php 
session_start();
require_once "helper.php";

// check apakah user telah login atau belum
function isLogin() {
  return $isLogin = isset($_SESSION['userNim']);
}

// jika belum, redirect ke halaman login
if (!isLogin()) {
  header('location: '.BASE_URL.'login/');
  return;
}

?>