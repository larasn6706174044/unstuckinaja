<?php 

// connection with PDO
$host = 'localhost';
$user = 'root';
$password = 'ngopi';
$dbName = 'unstuckinaja';

try {
  // make connection
  $connect = new PDO("mysql:host=$host;dbname=$dbName", $user, $password);

  // set error mode
  $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
  die('koneksi gagal : ' . $e->getMessage());
}

?>