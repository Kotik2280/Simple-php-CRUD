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
        $conn = require "config/database.php";
        $result = $conn->query("select * from users");
    }
    catch (PDOException $e) {
        if ($e->getCode() == 2002 && strpos($e->getMessage(), 'Connection refused') !== false) {
            echo "<br>Подключение базы данных...";
        }
        else {
            echo "<br>Ошибка подключения базы данных: " . $e->getMessage();
        }
    }
    ?>
    <h3>Пользователи</h3>

    <table>

    <tr>
    <td>Id</td>
    <td>Name</td>
    <td>Age</td>
    </tr>

    <?php
        if (!isset($result)) {
            echo "</table>";
            echo "<p>Данные загружаются...</p>";
        }
        else if ($result->rowCount() === 0) {
            echo "</table>";
            echo "<p>Пользователи ещё не добавлены</p>";
        } 
        else {
            while ($row = $result->fetch()) {
    ?>
                <tr>
                    <td> <?= $row["id"] ?> </td>
                    <td> <?= $row["Name"] ?> </td>
                    <td> <?= $row["Age"] ?> </td>
                    <td>
                        <a href="editForm.php?id=<?= $row["id"] ?>&oldName=<?= $row["Name"] ?>&oldAge=<?= $row["Age"] ?>">Изменить</a>
                    </td>
                    <td> 
                        <form action="deletePost.php" method="POST">
                            <input name="Name" type="hidden" value="<?= $row["Name"] ?>">
                            <input name="id" type="hidden" value="<?= $row["id"] ?>">
                            <input type="submit" value="Удалить">
                        </form> 
                    </td>
                </tr>
    <?php
            }
            echo "</table>";
        }
    ?>
    
</body>
</html>