<?php 
$mysql = new mysqli('mysql', 'user', 'password', 'school');
if (!$mysql){
	die("Error connect to data base");
}
$query1="SELECT id_teacher, Surname FROM teacher";
$result1=$mysql->query($query1);
?>
<!doctype html>
<html>
<head>
<title>Обновление</title>
<link href="../../../../materials/style/AuthorizationStyle.css" rel="stylesheet" type="text/css">
<link href="../../../../materials/icon/schoolicon.ico" rel="icon" type='mage/x-icon'>
</head>
<body>
<form action="./ProcessAddClass.php" method = "post" class = "box">
<b><p>Добавление</p></b>
<img src="../../../../materials/images/add.png" width="50" height="50" >
<b><p></p></b>
<select name="Surname">
<option>Выбор учитель</option>
<?php while ($row=$result1->fetch_array(MYSQLI_ASSOC)){ ?>
<option value=<?php echo $row['id_teacher']?>>"<?php echo $row['Surname']?>"</option>
<?php }?>
</select>
<b><p>Класс</p></b>
<input type="number" name="id_class" placeholder="Введите класс">
<b><p>Буква класса</p></b>
<textarea name="id_character" placeholder="Введите букву класса"></textarea>
<button type="submit">Добавить</button>
</form>
</body>
</html>