
<html lang="ru">
<head>
<meta charset="UTF-8">
<title>Обновление...</title>
<link href="../../../../materials/style/AuthorizationStyle.css" rel="stylesheet" type="text/css">
<link href="../../../../materials/icon/schoolicon.ico" rel="icon" type='mage/x-icon'>
</head>
<body>
<form class="box">
<?php
$mysql = new mysqli('mysql', 'user', 'password', 'school');
if (!$mysql){
	die("Error connect to data base");
}
$id_club=$_POST['id_club'];
$Surname=$_POST['Surname'];
$name_club= $_POST['name_club'];
$price=$_POST['price'];
$query="UPDATE `school`.`club` SET `id_club`=$id_club,`name_club`='$name_club' ,`id_teacher`=$Surname ,`price`='$price' WHERE `id_club`=$id_club";
$res=$mysql->query($query);
if ($res){
  echo "<img src='../../../../materials/images/successful.png' width='150' height='150'>";
  echo '<center>Успешно!</center><br>';
  echo '<center>Добавлен!</center><br>';
} else {
  echo "<img src='../../../../materials/images/error.png' width='150' height='150'>";
  echo  'Error '. mysqli_error($mysql) . '</p>';
}
$mysql->close();
echo "<a href='../Club.php'>Вернутся к таблице</a>"; 
echo "<h1> </h1>"; 
?>
</form>
</body>