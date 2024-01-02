<?php 
$mysql = new mysqli('mysql', 'user', 'password', 'school');
if (!$mysql){
	die("Error connect to data base");
}
$query="SELECT * FROM subject";
$result=$mysql->query($query);
?>
<!doctype html>
<html>
<head>
<title>Добавление занятости</title>
<link href="../../../../materials/style/AuthorizationStyle.css" rel="stylesheet" type="text/css">
<link href="../../../../materials/icon/schoolicon.ico" rel="icon" type='mage/x-icon'>
</head>
<body>
<form action="./ProcessAddEmploymentSubject.php" method = "post" class = "box">
<b><p>Добавление</p></b>
<img src="../../../../materials/images/add.png" width="50" height="50" >
<input type="hidden" name ="id_teacher" value="<?=$_GET['id_teacher']?>">
<b><p>Класс</p></b>
<input type="number" name="id_class" placeholder="Введите класс">
<b><p>Буква класса</p></b>
<textarea name="id_character" placeholder="Введите букву класса"></textarea>
<select name="name_subject">
<option>Предмет</option>
<?php while ($row=$result->fetch_array(MYSQLI_ASSOC)){ ?>
<option value=<?php echo $row['id_subject']?>>"<?php echo $row['name_subject']?>"</option>
<?php }?>
</select>
<button type="submit">Добавить</button>
</form>
</body>
</html>