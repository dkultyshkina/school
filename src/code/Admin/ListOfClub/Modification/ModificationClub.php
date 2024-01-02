<?php 
$mysql = new mysqli('mysql', 'user', 'password', 'school');
if (!$mysql){
	die("Error connect to data base");
}
$query1="SELECT id_teacher, Surname FROM teacher";
$result1=$mysql->query($query1);
$id=$_GET['id_club'];
$club=$mysql->query("SELECT * FROM club WHERE id_club = $id");
$club=mysqli_fetch_array($club);
?>
<!doctype html>
<html>
<head>
<title>Обновление</title>
<link href="../../../../materials/style/AuthorizationStyle.css" rel="stylesheet" type="text/css">
<link href="../../../../materials/icon/schoolicon.ico" rel="icon" type='mage/x-icon'>
</head>
<body>
<form action="./ProcessModificationClub.php" method = "post" class = "box">
<b><p>Изменение</p></b>
<img src="../../../../materials/images/add.png" width="50" height="50" >
<input type="hidden" name ="id_club" value="<?=$_GET['id_club']?>">
<b><p>Название кружка</p></b>
<textarea name="name_club" value="<?=$club['name_club']?>"></textarea>
<b><p>Выбор учителя</p></b>
<select name="Surname">
<option>Выбор учителя</option>
<?php while ($row=$result1->fetch_array(MYSQLI_ASSOC)){ ?>
<option value=<?php echo $row['id_teacher']?>>"<?php echo $row['Surname']?>"</option>
<?php }?>
</select>
<b><p>Цена</p></b>
<input type="number" name="price" value="<?=$club['price']?>">
<button type="submit">Обновить</button>
</form>
</body>
</html>