<?php
    if (isset($_POST["Name"]) && isset($_POST["Age"])) {
    
        $name = htmlentities($_POST["Name"]);
        $age = htmlentities($_POST["Age"]);

        try {
            $conn = require "config/database.php";

            $preparedQuery = $conn->prepare("INSERT INTO users (Name, Age) VALUES (:name, :age)");

            $preparedQuery->bindValue(":name", $name);
            $preparedQuery->bindValue(":age", $age);

            $preparedQuery->execute();

            echo "Пользователь $name успешно добавлен!";
        }
        catch (PDOException $e) {
            echo "Ошибка mysql: " . $e->getMessage();
        }
    }
    else {
        echo "Вы не указали имя или возраст!";
    }
?>
<br>
<a href="index.php">На главную</a>