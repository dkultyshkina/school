<?php
$mysql = new mysqli('mysql', 'user', 'password', 'school') or exit ();
if (!$mysql){
	die("Error connect to data base");
}
$id=$_GET['id_counter'];
$class=$mysql->query("SELECT * FROM class WHERE id_counter = $id");
$class=mysqli_fetch_array($class);
$mysql->close();
?>
<!doctype html>
<html>
<head>
<title>Обновление информации об учителях</title>
<link href="../../../../materials/style/AuthorizationStyle.css" rel="stylesheet" type="text/css">
<link href="../../../../materials/icon/schoolicon.ico" rel="icon" type='mage/x-icon'>
</head>
<body>
<form action="./ProcessModificationEmploymentClass.php" method = "post" class = "box">
<b><p>Обновление учителя</p></b>
<img src="../../../../materials/images/change.png" width="50" height="50" >
<input type="hidden" name ="id_teacher" value="<?=$_GET['id_teacher']?>">
<input type="hidden" name ="id_counter" value="<?=$_GET['id_counter']?>">
<b><p>Класс</p></b>
<input type="number" name="id_class" value="<?=$class['id_class']?>">
<b><p>Буква класса</p></b>
<textarea name="id_character"><?=$class['id_character']?></textarea>
<button type="update">Обновить</button>
</form>
</body>
</html>