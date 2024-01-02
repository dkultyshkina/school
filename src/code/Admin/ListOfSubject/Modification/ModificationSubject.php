<?php
$mysql = new mysqli('mysql', 'user', 'password', 'school');
if (!$mysql){
	die("Error connect to data base");
}
$id=$_GET['id_subject'];
$subject=$mysql->query("SELECT * FROM subject WHERE id_subject = $id");
$subject=mysqli_fetch_array($subject);
$mysql->close();
?>
<!doctype html>
<html>
<head>
<title>Изменение данных</title>
<link href="../../../../materials/style/AuthorizationStyle.css" rel="stylesheet" type="text/css">
<link href="../../../../materials/icon/schoolicon.ico" rel="icon" type='mage/x-icon'>
</head>
<body>
<form action="./ProcessModificationSubject.php" method = "post" class = "box">
<b><p>Изменение данных</p></b>
<img src="../../../../materials/images/change.png" width="50" height="50" >
<input type="hidden" name ="id" value="<?=$_GET['id_subject']?>">
<b><p>id Предмета</p></b>
<input type="number" name="id_subject" value="<?=$subject['id_subject']?>">
<b><p>Предмета</p></b>
<textarea name="name_subject" value="<?=$subject['name_subject']?>"></textarea>
<button type="update">Обновить</button>
</form>
</body>
</html>