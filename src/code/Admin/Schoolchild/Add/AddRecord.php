<?php 
$mysql = new mysqli('mysql', 'user', 'password', 'school');
if (!$mysql){
	die("Error connect to data base");
}
$query1="SELECT * FROM subject";
$result1=$mysql->query($query1);
$query2="SELECT * FROM mark";
$result2=$mysql->query($query2);
?>
<html>
<head>
<title>Добавление успеваемости</title>
<link href="../../../../materials/style/AuthorizationStyle.css" rel="stylesheet" type="text/css">
<link href="../../../../materials/icon/schoolicon.ico" rel="icon" type='mage/x-icon'>
</head>
<body>
<form action="./ProcessAddRecord.php" method = "post" class = "box">
<b><p>Добавление данных</p></b>
<img src="../../../../materials/images/add.png" width="50" height="50" >
<input type="hidden" name ="id_schoolchild" value="<?=$_GET['id_schoolchild']?>">
<b><p>Предмет</p></b>
<select name="name_subject">
<option>Предмет</option>
<?php while ($row=$result1->fetch_array(MYSQLI_ASSOC)){ ?>
<option value=<?php echo $row['id_subject']?>>"<?php echo $row['name_subject']?>"</option>
<?php }?>
</select>
<b><p>Тип оценки</p></b>
<select name="name_mark">
<option>Тип оценки</option>
<?php while ($row=$result2->fetch_array(MYSQLI_ASSOC)){ ?>
<option value=<?php echo $row['id_mark']?>>"<?php echo $row['name_mark']?>"</option>
<?php }?>
</select>
<b><p>Оценки</p></b>
<input type="number" name="mark" placeholder="Введите оценку">
<button type="submit">Добавить</button>
</form>
</body>
</html>