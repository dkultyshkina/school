
<html lang="ru">
<head>
<meta charset="UTF-8">
<title>Добавление...</title>
<link href="../../../../materials/style/AuthorizationStyle.css" rel="stylesheet" type="text/css">
<link href="../../../../materials/icon/schoolicon.ico" rel="icon" type='mage/x-icon'>
</head>
<body>
<form action="" class = "box">
<?php
$mysql = new mysqli('mysql', 'user', 'password', 'school') or exit ();
if (!$mysql){
	die("Error connect to data base");
}
$id_teacher=$_POST['id_teacher'];
$Surname= $_POST['Surname'];
$First_name=$_POST['First_name'];
$Second_name= $_POST['Second_name'];
$class_guide=$_POST['class_guide'];
$number_phone=$_POST['number_phone'];
$data_birth=$_POST['data_birth'];
$query="INSERT INTO `school`.`teacher` (`id_teacher`, `Surname`, `First_name`, `Second_name`, `class_guide`, `number_phone`, `data_birth`) VALUES ('{$id_teacher}', '{$Surname}', '{$First_name}', '{$Second_name}', '{$class_guide}', '{$number_phone}', '{$data_birth}')";
$res=$mysql->query($query);
if ($res){
  echo "<img src='../../../../materials/images/successful.png' width='150' height='150'>";
  echo '<center>Успешно!</center><br>';
  echo '<center>Учитель добавлен!</center><br>';
} else {
	echo "<img src='../../../../materials/images/error.png' width='150' height='150'><br>";
	echo  'Error '. mysqli_error($mysql) . '</p>';
}
$mysql->close();
?>
<h4><center><a href='../Teacher.php'>Вернутся к таблице</a></center></h4>
</form>
</body>
</html>