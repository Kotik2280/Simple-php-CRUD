<?php include 'templates/header.php'; ?>


<?php
    $id = $_GET["id"];
    $oldName = $_GET["oldName"];
    $oldAge = $_GET["oldAge"];
?>

<form action="editPost.php" method="POST" class="form">
    <h3>Редактирование пользователя</h3>
    <input name="id" type="hidden" value="<? echo $id ?>">
    <p>
        Name
        <br>
        <input name="Name" type="text" value="<? echo $oldName ?>">
    </p>
    <p>
        Age
        <br>
        <input name="Age" type="text" value="<? echo $oldAge ?>">
    </p>
    <p>
        <input type="submit" value="Изменить" class="formSender" >
    </p>

    <p>
        <a href="index.php">На главную</a>
    </p>
</form>



<?php include 'templates/footer.php'; ?>