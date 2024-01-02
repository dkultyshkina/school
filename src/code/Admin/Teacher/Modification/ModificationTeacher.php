<?php
$mysql = new mysqli('mysql', 'user', 'password', 'school') or exit ();
$id=$_GET['id_teacher'];
$teacher=$mysql->query("SELECT * FROM teacher WHERE id_teacher = $id");
$teacher=mysqli_fetch_array($teacher);
$mysql->close();
?>
<!doctype html>
<html>
<head>
<title>Изменение информации об учителя</title>
<link href="../../../../materials/style/AuthorizationStyle.css" rel="stylesheet" type="text/css">
<link href="../../../../materials/icon/schoolicon.ico" rel="icon" type='mage/x-icon'>
</head>
<body>
<form action="./ProcessModificationTeacher.php" method = "post" class = "box">
<b><p>Изменение информации об учителя</p></b>
<img src="../../../../materials/images/change.png" width="50" height="50" >
<b><p>id учителя</p></b>
<input type="number" name="id_teacher" value="<?=$teacher['id_teacher']?>">
<b><p>Фамилия</p></b>
<textarea name="Surname"><?= $teacher['Surname']?></textarea>
<b><p>Имя </p></b>
<textarea name="First_name"><?=$teacher['First_name']?></textarea>
<b><p>Отчество </p></b>
<textarea name="Second_name"><?=$teacher['Second_name']?></textarea>
<b><p>Классное руководство</p></b>
<textarea name="class_guide"><?=$teacher['class_guide']?></textarea>
<b><p>Номер телефона</p></b>
<input type="number" name="number_phone" value="<?=$teacher['number_phone']?>">
<b><p>Дата рождения</p></b>
<input type="date" name="data_birth" value="<?=$teacher['data_birth']?>" >
<button type="update">Обновить</button>
</form>
</body>
</html>