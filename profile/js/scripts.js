
console.log("works");

var btnStuck = document.getElementById("btnStuck");

/*
btnStuck.addEventListener("click", addNewStuck);

function addNewStuck() {

  var title = document.getElementById("title").value;
  var tag = document.getElementById("tag").value;
  var today = new Date();
  var dd = today.getDate();
  var mm = today.getMonth() + 1;
  var yyyy = today.getFullYear();
  var date = yyyy + "-" + mm + "-" + dd;

  var xhr = new XMLHttpRequest();
  xhr.open("POST", "../stuck/controller/insert.php");

  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
  xhr.onreadystatechange = function() {
    
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
    }
    
  }
  
  xhr.send();
}
*/
/*
div class="twelve columns card card-stuck">

      <a href="./../../stuck/stuck.php?id=<?=$rows[$i]['stuckId']?>">
        <h4 class="stuck-title"> <?=$rows[$i]["title"]?> </h4>
      </a>
      
      <small class="bordered"><?=$rows[$i]["keterangan"]?></small>

      <div class="inline">
        <p>
          <small>votes</small>  
          <br>
          <?=$rows[$i]["votes"]?>
        </p>
        <p>
          <small>views</small>  
          <br>
          <?=$rows[$i]["views"]?>
        </p>
        <p>
          <small>answers</small>  
          <br>
          <?=$rows[$i]["jumlahKomentar"]?>
        </p>
      </div>
    
      <small>Ditanya : <?=$rows[$i]["editDate"]?></small>
      
    </div>

  */