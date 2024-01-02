<?php
$mysql = new mysqli('mysql', 'user', 'password', 'school');
if (!$mysql){
	die("Error connect to data base");
}
$id=$_GET['id_schoolchild'];
$schoolchild=$mysql->query("SELECT * FROM schoolchild WHERE id_schoolchild = $id");
$schoolchild=mysqli_fetch_array($schoolchild);
$mysql->close();
?>
<!doctype html>
<html>
<head>
<title>Изменение школьника</title>
<link href="../../../../materials/style/AuthorizationStyle.css" rel="stylesheet" type="text/css">
<link href="../../../../materials/icon/schoolicon.ico" rel="icon" type='mage/x-icon'>
</head>
<body>
<form action="./ProcessModificationSchoolchild.php" method = "post" class = "box">
<b><p>Изменение школьника</p></b>
<img src="../../../../materials/images/change.png" width="50" height="50" >
<b><p>id Школьника</p></b>
<input type="number" name="id_schoolchild" value="<?=$schoolchild['id_schoolchild']?>">
<b><p>Фамилия</p></b>
<textarea name="surname"><?= $schoolchild['surname']?></textarea>
<b><p>Имя </p></b>
<textarea name="first_name" ><?=$schoolchild['first_name']?></textarea>
<b><p>Отчество </p></b>
<textarea name="second_name" ><?=$schoolchild['second_name']?></textarea>
<b><p>Адрес</p></b>
<textarea name="address"><?= $schoolchild['address']?></textarea>
<b><p>Дата рождения </p></b>
<input type="date" name="date_birth" value="<?=$schoolchild['date_birth']?>" >
<b><p>Класс</p></b>
<input type="number" name="id_class" value="<?=$schoolchild['id_class']?>">
<b><p>Буква класса</p></b>
<textarea name="id_character"><?=$schoolchild['id_character']?></textarea>
<button type="update">Обновить</button>
</form>
</body>
</html>