<?php
    $id = $_GET["id"];
    $oldName = $_GET["oldName"];
    $oldAge = $_GET["oldAge"];
?>

<form action="editPost.php" method="POST" >
    <h3>Редактирование пользователя</h3>
    <input name="id" type="hidden" value="<? echo $id ?>">
    <input name="oldName" type="hidden" value="<? echo $oldName ?>">
    <input name="oldAge" type="hidden" value="<? echo $oldAge ?>">
    <p>
        Name: <input name="Name" type="text" value="<? echo $oldName ?>">
    </p>
    <p>
        Age: <input name="Age" type="text" value="<? echo $oldAge ?>">
    </p>
    <p>
        <input type="submit" value="Изменить">
    </p>
</form>

<a href="index.php">На главную</a>