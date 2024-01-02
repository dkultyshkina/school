<?php
$mysql = new mysqli('mysql', 'user', 'password', 'school');
if (!$mysql){
	die("Error connect to data base");
}
$id=$_GET['id_parent'];
$parent=$mysql->query("SELECT * FROM parent WHERE id_parent = $id");
$parent=mysqli_fetch_array($parent);
$relationship=$mysql->query("SELECT * FROM relationship WHERE id_parent = $id");
$relationship=mysqli_fetch_array($relationship);
$mysql->close();
?>
<html>
<head>
<title>Обновление информации о родителе</title>
<link href="../../../../materials/style/AuthorizationStyle.css" rel="stylesheet" type="text/css">
<link href="../../../../materials/icon/schoolicon.ico" rel="icon" type='mage/x-icon'>
</head>
<body>
<form action="./ProcessModificationParent.php" method = "post" class = "box">
<b><p>Обновление информации о родителе</p></b>
<img src="../../../../materials/images/change.png" width="50" height="50" >
<input type="hidden" name ="id_schoolchild" value="<?=$_GET['id_schoolchild']?>">
<b><p>id родителя</p></b>
<input type="number" name="id_parent" value="<?=$parent['id_parent']?>">
<b><p>Фамилия</p></b>
<textarea name="surName"><?= $parent['surName']?></textarea>
<b><p>Имя </p></b>
<textarea name="first_Name" ><?=$parent['first_Name']?></textarea>
<b><p>Отчество </p></b>
<textarea name="last_Name" ><?=$parent['last_Name']?></textarea>
<b><p>Адрес</p></b>
<textarea name="address"><?=$parent['address']?></textarea>
<b><p>Степень родства</p></b>
<textarea name="degree_kinship"><?=$relationship['degree_kinship']?></textarea>
<b><p>Номер </p></b>
<input type="number" name="phone_number" value="<?=$parent['phone_number']?>" >
<button type="update">Обновить</button>
</form>
</body>
</html>