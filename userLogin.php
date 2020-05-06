<?php
    
    require_once('configDB.php');
    require_once('passwordHasher.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = $_POST['Email'];
        $password = passwordHasher($_POST['Password']);
        $conn = mysqli_connect(servername, username, password, dbname);
        if(!$conn) {
            die('Помилка при підключенні до БД ' . mysqli_connect_error());
        }
        $sql = "SELECT * FROM user WHERE Email ='" . $email . "' AND Password ='" . $password ."'";
        $result = mysqli_query($conn, $sql);
       
        if (mysqli_num_rows($result)>0){
            $row = mysqli_fetch_assoc($result);
            session_start();
            $_SESSION['isAut'] = true;
            $_SESSION['Login'] = $row['login'];
            $_SESSION['urlAvatar'] = $row['urlAvatar'];
            $_SESSION['Role'] = $row['role'];
            echo true;
        } else {
            echo false;
        }
    }