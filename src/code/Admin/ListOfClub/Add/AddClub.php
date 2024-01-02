<?php 
$mysql = new mysqli('mysql', 'user', 'password', 'school');
if (!$mysql) {
	die("Error connect to data base");
}
$query1="SELECT id_teacher, Surname FROM teacher";
$result1=$mysql->query($query1);
?>
<!doctype html>
<html>
<head>
<title>Добавление</title>
<link href="../../../../materials/style/AuthorizationStyle.css" rel="stylesheet" type="text/css">
<link href="../../../../materials/icon/schoolicon.ico" rel="icon" type='mage/x-icon'>
</head>
<body>
<form action="./ProcessAddClub.php" method = "post" class = "box">
<b><p>Добавление</p></b>
<img src="../../../../materials/images/add.png" width="50" height="50" >
<b><p>Название кружка</p></b>
<textarea name="name_club" placeholder="Введите название кружка"></textarea>
<b><p>Выбор учителя</p></b>
<select name="Surname">
<option>Выбор учителя</option>
<?php while ($row=$result1->fetch_array(MYSQLI_ASSOC)){ ?>
<option value=<?php echo $row['id_teacher']?>>"<?php echo $row['Surname']?>"</option>
<?php }?>
</select>
<b><p>Цена</p></b>
<input type="number" name="price" placeholder="Введите цену">
<button type="submit">Добавить</button>
</form>
</body>
</html>