<?php

session_start();

require_once "./../model/model.php";


function getDetailStuck() {

  if ( isset($_GET["id"]) ) {

    $stuckId = $_GET["id"];

    $sql = "SELECT s.title, s.editDate, s.views, s.detail, t.tagId, t.keterangan, m.username, m.photo
    FROM stuck s
    INNER JOIN tag t
    ON s.tagId = t.tagId
    INNER JOIN member m
    ON s.nim = m.nim
    WHERE stuckId = :stuckId";

    $params = [
      ":stuckId" => $stuckId
    ];

    $row = select($sql, $params);

    $sql = "SELECT COUNT(voteStuckId) 'votes' FROM votestuck WHERE stuckId=:stuckId GROUP BY (stuckId)";
    $params = [":stuckId" => $stuckId];

    $votes = select($sql, $params);
    if ($votes ===  false) {
      $votes = ["votes" => 0];
    }

    $row = array_merge($row, $votes);

    $sql = "SELECT COUNT(commentId) 'comments' FROM comments WHERE stuckId=:stuckId";
    $params = [":stuckId" => $stuckId];

    $comments = select($sql, $params);
    if ($comments ===  false) {
      $comments = ["comments" => 0];
    }

    $row = array_merge($row, $comments);

    return $row;
  }

}

function isStuckOwner() {

  if ( isset($_SESSION["userNim"]) && isset($_GET["id"]) ) {

    $stuckId = $_GET["id"];
    $userNim = $_SESSION["userNim"];
    $stuckOwnerNim = null;

    $sql = "SELECT * FROM stuck WHERE stuckId=:stuckId";
    $params = [
      ":stuckId" => $stuckId
    ];

    $row = select($sql, $params);
    $stuckOwnerNim  = $row["nim"];

    if ($userNim === $stuckOwnerNim)
      return true;
    else
      return false;

  }

}

?>
