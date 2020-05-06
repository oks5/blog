<?php
// echo($_GET['Id']);
require_once('header.php');
require_once('configDB.php');
if ($_SERVER['REQUEST_METHOD']=='GET') {

    $conn = mysqli_connect(servername, username, password, dbname);
if(!$conn) {
    die('Помилка при підключенні до БД ' . mysqli_connect_error());
}
$sql = "SELECT record.Id as Id, record.Date as `Date`, record.Text as `Text`, record.Like as `Like`,
 record.DisLike as DisLike, user.login as autor
 FROM record
 LEFT JOIN `user`
 ON record.Id_autor = user.id
 WHERE record.Id = '" . $_GET['Id'] ."'";
 $result = mysqli_query($conn, $sql);
 $record = mysqli_fetch_assoc($result);
 $recordId = $record['Id'];
 ?>

<div class='m-5 p-2' style="border: solid black 2px">
    <span>АВТОР:</span> <?=$record['autor']?>
    <br>
   <span>ДАТА:  </span> <?=$record['Date']?>
   <br>
   <!-- <span>Статус:</span> <?=$status?> -->
   <br>
   <p align=justify> <?=$record['Text']?></p>
   
   <div> 
                <p style="display: inline" >
                    <img src="image/like.png" alt="" style="width: 15px; height:auto">
                    <span id="count<?=$record['Id']?>"><?=$record['Like']?></span> 
                </p>
                <p style="display: inline">
                    <img src="image/dislike.png" alt="" style="width: 15px; height:auto">
                   <span ><?=$record['DisLike']?></span> 
                </p>
            
    </div>
 

    <a href="#" type="button" class="w-100 btn btn-success" data-toggle="modal" data-target="#CommentModal">ДОДАТИ КОМЕНТАР</a>
   </div>

<?php 
}

?>


<!-- Modal -->
<div class="modal fade" id="CommentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ДОДАТИ КОМЕНТАР</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <input type="text" style="visibility:hidden" id="IdRecord" value="<?=$record['Id']?>">
         <input type="text" style="visibility:hidden" id="IdAutor" value="<?=$_SESSION['Login']?>">
         <div class="form-group">
        <label for="exampleFormControlTextarea1">Example textarea</label>
        <textarea class="form-control" id="textComment" rows="10" name='Text'></textarea>
    </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ЗАКРИТИ</button>
        <button type="button" class="btn btn-primary" id="saveComment">ЗБЕРЕГТИ</button>
      </div>
    </div>
  </div>
</div>






<?php
 require_once('footer.php');

 ?>
 <script src="JS/addComment.js"></script>
