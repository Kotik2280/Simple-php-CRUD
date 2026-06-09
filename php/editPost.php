<?php
    if (isset($_POST["id"]) && isset($_POST["oldName"]) && isset($_POST["oldAge"]) && isset($_POST["Name"]) && isset($_POST["Age"])) {
        $id = $_POST["id"];
        $oldName = $_POST["oldName"];
        $oldAge = $_POST["oldAge"];
        $Name = $_POST["Name"];
        $Age = $_POST["Age"];
    
        try {
            $conn = new PDO("mysql:host=mysql_db;dbname=usersdb", "root", "Kotik4916");

            $preparedQuery = $conn->prepare("UPDATE users SET Name = :name, Age = :age WHERE id = :id");

            $preparedQuery->bindValue(":name", $Name);
            $preparedQuery->bindValue(":age", $Age);
            $preparedQuery->bindValue(":id", $id);

            $preparedQuery->execute();

            echo "Пользователь $oldName $oldAge лет успешно изменён на $Name $Age лет";
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