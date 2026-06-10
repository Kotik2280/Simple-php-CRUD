<?php
    if (isset($_POST["id"]) && isset($_POST["Name"]) && isset($_POST["Age"])) {
        $id = $_POST["id"];
        $Name = $_POST["Name"];
        $Age = $_POST["Age"];
    
        try {
            $conn = new PDO("mysql:host=mysql_db;dbname=usersdb", "root", "Kotik4916");

            $checkQuery = $conn->prepare("SELECT * FROM users WHERE id = :id");
            $checkQuery->bindValue(":id", $id);
            $checkQuery->execute();

            if ($row = $checkQuery->fetch()) {
                $oldName = $row["Name"];
                $oldAge = $row["Age"];

                $preparedQuery = $conn->prepare("UPDATE users SET Name = :name, Age = :age WHERE id = :id");

                $preparedQuery->bindValue(":name", $Name);
                $preparedQuery->bindValue(":age", $Age);
                $preparedQuery->bindValue(":id", $id);

                $preparedQuery->execute();

                echo "Пользователь $oldName $oldAge лет успешно изменён на $Name $Age лет";
            }
            else {
                echo "Пользователь с указанным идентификатором не найден!";
            }
        }
        catch (PDOException $e) {
            echo "Ошибка редактирования данных: " . $e->getMessage();
        }
    }
    else {
        echo "Неверно переданы данные о пользователе!";
    }
?>
<br>
<a href="index.php">На главную</a>