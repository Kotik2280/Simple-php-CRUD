<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="addForm.php">Добавить пользователя</a>

    <?php
    try {
        $conn = new PDO("mysql:host=mysql_db;dbname=usersdb", "root", "Kotik4916");
        $result = $conn->query("select * from users");
    }
    catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    ?>
    <h3>Пользователи</h3>

    <table>

    <tr>
    <td>Id</td>
    <td>Name</td>
    <td>Age</td>
    </td>

    <?php
    while ($row = $result->fetch()) {
    ?>
        <tr>
            <td> <? echo $row["id"] ?> </td>
            <td> <? echo $row["Name"] ?> </td>
            <td> <? echo $row["Age"] ?> </td>
            <td>
                <a href="editForm.php?id=<? echo $row["id"] ?>&oldName=<? echo $row["Name"] ?>&oldAge=<? echo $row["Age"] ?>">Изменить</a>
            </td>
            <td> 
                <form action="deletePost.php" method="POST">
                    <input name="Name" type="hidden" value="<?php echo $row["Name"] ?>">
                    <input name="id" type="hidden" value="<?php echo $row["id"] ?>">
                    <input type="submit" value="Удалить">
                </form> 
            </td>
        </tr>
    <?php
    }
    ?>

    </table>
</body>
</html>