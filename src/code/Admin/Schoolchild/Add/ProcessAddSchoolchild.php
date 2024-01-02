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
$mysql = new mysqli('mysql', 'user', 'password', 'school');
if (!$mysql){
	die("Error connect to data base");
}
$id_schoolchild=$_POST['id_schoolchild'];
$surname= $_POST['surname'];
$first_name=$_POST['first_name'];
$second_name= $_POST['second_name'];
$address=$_POST['address'];
$date_birth=$_POST['date_birth'];
$id_class=$_POST['id_class'];
$id_character=$_POST['id_character'];
$query="INSERT INTO `school`.`schoolchild` (`id_schoolchild`, `surname`, `first_name`, `second_name`, `address`, `date_birth`, `id_class`, `id_character`) VALUES ('{$id_schoolchild}', '{$surname}', '{$first_name}', '{$second_name}', '{$address}', '{$date_birth}', '{$id_class}', '{$id_character}')";
$result=$mysql->query("SELECT id_class, id_character FROM class WHERE (class.id_class = $id_class AND class.id_character = '$id_character')");

if (mysqli_num_rows($result)){
$res=$mysql->query($query);
if ($res){
  echo "<img src='../../../../materials/images/successful.png' width='150' height='150'>";
  echo '<center>Успешно!</center><br>';
  echo '<center>Школьник добавлен!</center><br>';
} else{
  echo "<img src='../../../../materials/images/error.png' width='150' height='150'><br>";
  echo  '<center>Error '. mysqli_error($mysql) . '</center>';}
} else {echo "<img src='error.png' width='150' height='150'><br>";
  echo  '<center>Такого класса не существует</center>'; }
  $mysql->close();
?>
<h4><center><a href='../Schoolchild.php'>Вернутся к таблице</a></center></h4>
</form>
</body>
</html>