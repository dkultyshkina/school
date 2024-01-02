<?php
$mysql = new mysqli('mysql', 'user', 'password', 'school') or exit ();
if (!$mysql){
	die("Error connect to data base");
}
$id=$_GET['id_teaching'];
$teaching=$mysql->query("SELECT * FROM teaching WHERE id_teaching = $id");
$teaching=mysqli_fetch_array($teaching);
$query1="SELECT * FROM subject";
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
<form action="./ProcessModificationEmploymentSubject.php" method = "post" class = "box">
<b><p>Обновление</p></b>
<img src="../../../../materials/images/change.png" width="50" height="50" >
<input type="hidden" name ="id_teacher" value="<?=$_GET['id_teacher']?>">
<input type="hidden" name ="id_teaching" value="<?=$_GET['id_teaching']?>">
<b><p>Буква класса</p></b>
<input type="number" name="id_class" value="<?=$teaching['id_class']?>">
<b><p>Буква класса</p></b>
<textarea name="id_character"><?=$teaching['id_character']?></textarea>
<b><p>Предмет</p></b>
<select name="name_subject">
<option>Предмет</option>
<?php while ($row=$result1->fetch_array(MYSQLI_ASSOC)){ ?>
<option value=<?php echo $row['id_subject']?>>"<?php echo $row['name_subject']?>"</option>
<?php }?>
</select>
<button type="update">Обновить</button>
</form>
</body>
</html>