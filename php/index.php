<?php include 'templates/header.php'; ?>
    <p>
        <a href="addForm.php">Добавить пользователя</a>
    </p>
    

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
    <th>Id</th>
    <th>Name</th>
    <th>Age</th>
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
                    <td class="notCell">
                        <a href="editForm.php?id=<?= $row["id"] ?>&oldName=<?= $row["Name"] ?>&oldAge=<?= $row["Age"] ?>">Изменить</a>
                    </td>
                    <td class="notCell"> 
                        <form action="deletePost.php" method="POST">
                            <input name="Name" type="hidden" value="<?= $row["Name"] ?>">
                            <input name="id" type="hidden" value="<?= $row["id"] ?>">
                            <input class="danger" type="submit" value="Удалить">
                        </form> 
                    </td>
                </tr>
    <?php
            }
            echo "</table>";
        }
    ?>

<?php include 'templates/footer.php'; ?>