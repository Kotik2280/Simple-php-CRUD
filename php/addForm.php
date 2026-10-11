<?php include 'templates/header.php'; ?>

<form action="addPost.php" method="post" class="form">
    <h3>Добавить пользователя</h3>

    <p>
        Name
        <br>
        <input name="Name" type="text">
    </p>

    <p>
        Age
        <br>
        <input name="Age" type="text">
    </p>

    <p>
        <input class="formSender" type="submit" value="Добавить">
    </p>

    <p>
        <a href="index.php">На главную</a>
    </p>
</form>




<?php include 'templates/footer.php'; ?>