
<?php
   
    require_once('configDB.php');
  
?>



<?php
 $conn = mysqli_connect(servername, username, password, dbname);
        if(!$conn) {
            die('Помилка при підключенні до БД ' . mysqli_connect_error());
        }

        $Login=$_POST['Login'];
        $sql = "SELECT * FROM user WHERE Login ='" . $_SESSION['Login'] . "'";