<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLOG</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<div id="container-nav">
<nav class="navbar navbar-expand-lg navbar-light bg-light" id="nav">
  <a class="navbar-brand" href="index.php">BLOG</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">ЗАПИСИ<span class="sr-only">(current)</span></a>
      </li>

      <?php
        if (isset($_SESSION['Role']) &&  $_SESSION['Role'] == 'autor') {
      ?>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          МОЇ ЗАПИСИ
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="viewAutorAllRecord.php">Мої записи</a>
          <a class="dropdown-item" href="addRecord.php">Додати запис</a>
        </div>
      </li>

      <?php
        }
      ?>

      <?php

        if (isset($_SESSION['Role']) &&  $_SESSION['Role'] == 'administrator') {

      ?>


      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          ПАНЕЛЬ АДМІНІСТРАТОРА
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Записи</a>
          <a class="dropdown-item" href="#">Коментарі</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="adminUser.php">Користувачі</a>
        </div>
      </li>

      <?php
        }
      ?>
    </ul>
<?php
    
    if (isset($_SESSION['isAut'])) {
?>
        <img src="avatar/<?=$_SESSION['urlAvatar']?>" alt="" style="height:40px; wight:auto; border-radius:50%">
        <a href="#"><?=$_SESSION['Login']?></a> /
        <a href="#" id="logOut"> Вихід </a>
<?php
    } else {
?>
        <a href="userInsert.php"> Реєстрація / </a>
        <a href="#" data-toggle="modal" data-target="#LoginModal" > Авторизуватися</a>
<?php
    }
?>
  </div>
</nav>
</div>

<!-- Modal -->
<div class="modal fade" id="LoginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Авторизація користувача</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
      


    <div class="form-group">
        <label for="exampleInputEmail1">Електронна адреса</label>
        <input type="email" class="form-control" id="Email" aria-describedby="emailHelp" name="Email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1">Пароль</label>
        <input type="password" class="form-control" id="Password" name="Password">
    </div>

   


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
        <button type="button" class="btn btn-primary" id="userLogin">Авторизуватися</button>
      </div>
    </div>
  </div>
</div>