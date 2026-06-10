<?php
    if (isset($_POST["id"]) && isset($_POST["Name"]))
    {
        $id = htmlentities($_POST["id"]);
        $name = htmlentities($_POST["Name"]);

        try {
            $conn = require "config/database.php";

            $preparedQueryCount = $conn->prepare("SELECT COUNT(*) FROM users WHERE id=:id");

            $preparedQueryCount->bindValue(":id", $id);

            $preparedQueryCount->execute();

            if ($preparedQueryCount->fetchColumn()) {
                $preparedQueryDelete = $conn->prepare("DELETE FROM users WHERE id=:id");

                $preparedQueryDelete->bindValue(":id", $id);

                $preparedQueryDelete->execute();

                echo "Пользователь $name успешно удалён!";
            }
            else {
                echo "Такого пользователя не существует!";
            }
        }
        catch (PDOException $e) {
            echo "Ошибка удаления пользователя: " . $e->getMessage();
        }
    }
    else {
        echo "Ошибка удаления пользователя: индентификатор не передан";
    }
?>
<br>
<a href="index.php">На главную</a>