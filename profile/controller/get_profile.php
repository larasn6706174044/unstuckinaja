<?php 

require_once "../model/model.php";

// ===================================
// GET DATA PROFILE
// ===================================
function getDataProfile($nim) {
  
  $sql = "SELECT * FROM member WHERE nim=:nim";

  $params = [
    ":nim" => $nim,
  ];
  
    
  $row = select($sql, $params);

  $_SESSION['userData'] = [
    'username' => $row['username'],
    'nama' => $row['nama'],
    'photo' => $row['photo'],
    'motto' => nl2br($row['motto']),
    'bio' => nl2br($row['bio']),
    'email' => $row['email'],
    'twitter' => $row['twitter'],
    'github' => $row['github'],
    'siteUrl' => $row['siteUrl'],
  ];

  return $row;
  
}

?>