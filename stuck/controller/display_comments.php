<?php

require_once "../model/model.php";
require_once "../helper.php";
require_once "checkLike.php";

function displayComments() {
  $userNim = null;

  if ( isset($_SESSION["userNim"]) ) {
    $userNim = $_SESSION["userNim"];  
  }
  
  if ( ! isset($_GET["id"]) ) {
    header("location: ".BASE_URL);
    exit;
  }
  
  $stuckId = $_GET["id"];
  $sql = "SELECT c.*, m.username, m.nim, m.photo, COUNT(vc.voteCommentId) 'jumlah_votes', c.editDate
          FROM comments c
          LEFT JOIN votecomment vc
          ON vc.commentId = c.commentId
          INNER JOIN member m
          ON c.nim = m.nim
          WHERE c.stuckId=:stuckId
          GROUP BY c.commentId
          ORDER BY editDate DESC";
  
  $rows = selectAll($sql, [":stuckId" => $stuckId]);
  foreach ($rows as $key) {
    ?>
      <div class="comments">
        <div class="comment-header">
          <img src="<?=BASE_URL."profile/uploads/".$key["photo"]?>" width=32>
          <a href=""><?=$key["username"]?></a>
          <br>
          <small>likes : <span id="like-<?=$key["commentId"]?>"><?=$key["jumlah_votes"]?></span> | edit terakhir : <?=$key["editDate"]?></small>
        </div>
  
        <div class="comment-detail">
          <?=$key["comment"]?>
        </div>
  <!-- GUNAKAN AND -->
        <div class="comment-button">
          <?php 
            
            if ( isLiked($key["commentId"], $userNim) ) {
              ?>
                <button id="btnLike-<?=$key["commentId"]?>" class="button" value="<?=$key["commentId"]?>" onclick="likeComment(this.value)">Unlike</button>        
              <?php
            } else {
                if ( isset($_SESSION["userNim"]) ) {
                  ?>
                  <button id="btnLike-<?=$key["commentId"]?>"   class="button button-primary" value="<?=$key["commentId"]?>" onclick="likeComment(this.value)">Like</button>        

              <?php
          }
            }
            
            if ( $key["nim"] === $userNim ) {
              ?>
                <button class="button" value="<?=$key["commentId"]?>" onclick="removeComment(this.value)">hapus</button>
              <?php
            }  
          ?>
  
        </div>
      </div>    
    <?php
  }
}

