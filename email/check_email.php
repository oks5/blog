<?php
 require_once('../configDB.php');

 $conn = mysqli_connect(servername, username, password, dbname);
 if(!$conn) {
     die('Помилка при підключенні до БД ' . mysqli_connect_error());
 }

 $email=$_GET['id'];
 $sql = "SELECT * FROM user WHERE Email = '" . $email . "'";
 $result = mysqli_query($conn, $sql);
 if (mysqli_num_rows($result)>0) {
     $row = mysqli_fetch_assoc($result);
     if($row['Status']){
         ?>
        <b>Ел адр вже була підтвердж</b>

         <?php
                 
     } else {
             session_start();
            $_SESSION['isAut'] = true;
            $_SESSION['Login'] = $row['login'];
            $_SESSION['urlAvatar'] =  $row['urlAvatar'];
            $_SESSION['Role'] = 'follower';
            // Header('Location: index.php');

         $sql = "UPDATE user SET Role = 'follower', Status = true";
         $result = mysqli_query($conn, $sql);
         ?>

        <b>Ел адр  підтвердж</b>
         <?php

     }
 }
 ?>
 <a href="http://localhost:777/blog/">Повернутись на головну</a>
