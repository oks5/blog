<?php
require_once('header.php');
require_once('configDB.php');
$conn = mysqli_connect(servername, username, password, dbname);
if(!$conn) {
    die('Помилка при підключенні до БД ' . mysqli_connect_error());
}
$sql = "SELECT * FROM user";
$result=mysqli_query($conn,$sql);


    ?>
        <table border="1" class="m-5">

        <thead>
            <td>id</td>
            <td>nick</td>
            <td>role</td>
            <td>Change Role</td>
            <td>Delete User</td>

        </thead>
        <tbody>
        <?php
        while ($record=mysqli_fetch_assoc($result)){

            ?>        

        
        <tr>
            <td class="Id"><?=$record['id']?></td>
            <td><?=$record['login']?></td>
            <td><?=$record['email']?></td>
            <td class="TextRole"><?=$record['role']?></td>

            <td>
            <select name="role" class="ChangeRole" >
            <option value="follower">читач</option>
            <option value="autor">автор</option>
            <option value="administrator">адміністратор</option>
            </select>
        </td>

        <td>
        DELETEE
        </td>
        </tr>
        
   
    <?php
}
?>
</tbody>
</table>
<?php
require_once('footer.php');
?>
<script src="JS/userRole.js"></script>
