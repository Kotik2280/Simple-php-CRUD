<?php include 'templates/header.php'; ?>

<?php
    if (isset($_POST["Name"]) && isset($_POST["Age"])) {
    
        $name = htmlentities($_POST["Name"]);
        $age = htmlentities($_POST["Age"]);

        if (is_numeric($age)) {
            if ($age > 0 && $age <= 120) {
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
                echo "Возраст должен быть от 1 до 120 лет";
            }
        }
        else {
            echo "В поле возраста нужно записать число";
        }
    }
    else {
        echo "Вы не указали имя или возраст!";
    }
?>
<br>
<p>
    <a href="index.php">На главную</a>
</p>


<?php include 'templates/footer.php'; ?>