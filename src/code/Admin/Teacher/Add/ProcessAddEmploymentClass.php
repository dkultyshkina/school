
<html lang="ru">
<head>
<meta charset="UTF-8">
<title>Добавление...</title>
<link href="../../../../materials/style/AuthorizationStyle.css" rel="stylesheet" type="text/css">
<link href="../../../../materials/icon/schoolicon.ico" rel="icon" type='mage/x-icon'>
</head>
<body>
<form class="box">
<?php
$mysql = new mysqli('mysql', 'user', 'password', 'school') or exit ();
if (!$mysql){
	die("Error connect to data base");
}
$id_teacher=$_POST['id_teacher'];
$id_class= $_POST['id_class'];
$id_character=$_POST['id_character'];
$query="INSERT INTO `school`.`class` (`id_counter` ,`id_class` ,`id_teacher` ,`id_academicyear` ,`id_character`) VALUES (NULL , $id_class, $id_teacher, '1', '$id_character')";
$res=$mysql->query($query);
if ($res){
	echo "<img src='../../../../materials/images/successful.png' width='150' height='150'>";
  echo '<center>Успешно!</center><br>';
  echo '<center>Добавлен!</center><br>';
} else{ 
  echo "<img src='../../../../materials/images/error.png' width='150' height='150'>";
  echo  'Error '. mysqli_error($mysql) . '</p>';
}
$mysql->close();
?>
<?php
echo "<a href='../EmploymentTeacher.php?id_teacher=".$id_teacher."'>Вернутся к таблице</a>"; 
echo "<h1> </h1>"; ?>
</form>
</body>
</html>