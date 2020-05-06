<?php
    require_once('header.php');
    require_once('configDB.php');
    // echo 'http://' . $_SERVER['HTTP_HOST'];




$conn = mysqli_connect(servername, username, password, dbname);
if(!$conn) {
    die('Помилка при підключенні до БД ' . mysqli_connect_error()); //підключ до бд
}


$sql = "SELECT * FROM record WHERE status='approved'";
$result = mysqli_query($conn, $sql);
while ($record = mysqli_fetch_assoc($result)) {

    $sql_comment = "SELECT COUNT(IdRecord) as CountComm from `comment` WHERE IdRecord='" . $record['Id'] . "'";
    $res_comm = mysqli_query($conn, $sql_comment);
    $res_comm = mysqli_fetch_assoc($res_comm);

    
   ?>
   <div class='m-5 p-2' style="border: solid black 2px">
   <span>ДАТА:  </span> <?=$record['Date']?>
   <br>
   <!-- <span>Статус:</span> <?=$status?> -->
   <br>
   <p align=justify> <?=$record['Text']?></p>
   <p align=left>Коментарів: <?= $res_comm['CountComm']?></p>
   <div> 
                <p style="display: inline" onclick="addLike(<?=$record['Id']?>)">
                    <img src="image/like.png" alt="" style="width: 15px; height:auto">
                    <span id="count<?=$record['Id']?>"><?=$record['Like']?></span> 
                </p>
                <p style="display: inline">
                    <img src="image/dislike.png" alt="" style="width: 15px; height:auto">
                   <span ><?=$record['DisLike']?></span> 
                </p>
            
    </div>
    <a href="updateRecord.php?id_record=<?=$record['id']?>" type="button" class="btn btn-success">РЕДАГУВАТИ</a>

    <a href="viewItemRecord.php?Id=<?=$record['Id']?>" type="button" class="w-100 btn btn-success">ПЕРЕГЛЯД</a>
   </div>


<?php   
}


?>


<?php
    require_once('footer.php');
    ?>
    <script >
    function addLike(Id){
        alert(Id);
        alert($('#count'+Id).text());
        $.post('addLike.php', {
            'Id':Id
        }, function(data,status){
            alert(data);
            if (data){
            var result = JSON.parse(data);
            
            $('#count'+result.Id).text(result.Like);
            }
           

        })
    }
    </script>