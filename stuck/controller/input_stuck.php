<?php 
require_once '../../model/model.php';
require_once '../../auth.php';
require_once '../../helper.php';

$isSubmit = isset($_POST['submit']);

if (!$isSubmit) {
  header("location:".BASE_URL."profile/");
  exit;
}

// ===================================
// AMBIL DAN FILTER DATA
// ===================================
  $nim = $_SESSION['userNim'];
  $stuckId = substr( md5( $nim . date('Y/m/d ' . time() ) ), 0, 6 );
  $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
  $detail = $_POST['detail'];
  $editDate = date('Y/m/d');
  $tagId = filter_input(INPUT_POST, 'tag', FILTER_SANITIZE_STRING);
  
  // validasi input, jika gagal, redirect ke halaman utama
  if ( empty(trim($title)) || empty(trim($detail)) || empty(trim($tagId)) || $tagId == 'false' ) {
    header('location: ../index.php?status=wrong_input');
    return;
  } 
  
  // simpan data
  $sql = 
  "INSERT INTO stuck (stuckId, title, editDate, detail, tagId, nim)
  VALUES (:stuckId, :title, :editDate, :detail, :tagId, :nim)
  ";
  $params = [
    ':stuckId' => $stuckId,
    ':title' => $title,
    ':editDate' => $editDate,
    ':detail' => $detail,
    ':tagId' => $tagId,
    ':nim' => $nim
  ];
  
  $status = crud($sql, $params);
  if (!$status) {
    header('location: ../index.php?status=input_failed');
    return;
  }
  
  header('location: ../profile/?status=success');
  return;