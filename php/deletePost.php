<?php
    if (isset($_POST["id"]) && isset($_POST["Name"]))
    {
        $id = htmlentities($_POST["id"]);
        $name = htmlentities($_POST["Name"]);

        try {
            $conn = new PDO("mysql:host=mysql_db;dbname=usersdb", "root", "Kotik4916");

            $preparedQueryCount = $conn->prepare("SELECT * FROM users WHERE id=:id");

            $preparedQueryCount->bindValue(":id", $id);

            $resultsCount = $preparedQueryCount->execute();

            if ($resultsCount = 1) {
                $preparedQueryDelete = $conn->prepare("DELETE FROM users WHERE id=:id");

                $preparedQueryDelete->bindValue(":id", $id);

                $preparedQueryDelete->execute();

                echo "Пользователь $name успешно удалён!";
            }
            else {
                echo "Такого пользователя не существует!";
            }
        }
        catch (PDOExcetion $e) {
            echo "Ошибка удаления пользователя: " . $e->getMessage();
        }
    }
    else {
        echo "Ошибка удаления пользователя: индентификатор не передан";
    }
?>
<br>
<a href="index.php">На главную</a>