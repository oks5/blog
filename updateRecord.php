<?php
require_once('header.php');
require_once('configDB.php');

if ($_SERVER['REQUEST_METHOD']=='GET'){
    $conn = mysqli_connect(servername, username, password, dbname);
if(!$conn) {
    die('Помилка при підключенні до БД ' . mysqli_connect_error());
}
$sql = "SELECT * FROM record WHERE id ='" . $_GET['id_record'] . "'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
var_dump ($row);


?>

<h1  class="m-5">РЕДАГУВАТИ ЗАПИС</h1>
<form action="" method="POST" class="m-5">
    <div class="form-group">

    <label for="id">ID оголошення</label>
    <input type="text" name="id" readonly value=<?=$row['id']?>>
        <label for="exampleFormControlTextarea1">Example textarea</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name='Text'><?=$row['Text']?></textarea>
    </div>
    <button type="submit">ЗБЕРІГТИ</button>
</form>

<?php

}
?>
<?php
if ($_SERVER['REQUEST_METHOD']=='POST'){
    $sql ="UPDATE record SET Text='" . $_POST['Text'] . "', Status = 'not approved' WHERE id='". $_POST['Id'] . "'";

    if (mysqli_query($conn, $sql)) {
        mysqli_close($conn);
        Header('Location: viewAutorAllRecord.php');
    } else {
        echo 'Error: ' . $sql . ' ' . mysqli_error($conn);
    }
}


?>










<?php
require_once('footer.php');