
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
$mysql = new mysqli('mysql', 'user', 'password', 'school');
if (!$mysql) {
	die("Error connect to data base");
}
$Surname=$_POST['Surname'];
$name_club= $_POST['name_club'];
$price=$_POST['price'];
$query="INSERT INTO `school`.`club` (`id_club` ,`name_club` ,`id_teacher` ,`price`) VALUES (NULL , '$name_club', $Surname,'$price')";
$res=$mysql->query($query);
if ($res) {
	echo "<img src='../../../../materials/images/successful.png' width='150' height='150'>";
  echo '<center>Успешно!</center><br>';
  echo '<center>Добавлен!</center><br>';
} else { 
  echo "<img src='../../../../materials/images/error.png' width='150' height='150'>"; 
  echo  'Error '. mysqli_error($mysql) . '</p>';
}
$mysql->close();
?>  
<?php
echo "<a href='../Club.php'>Вернутся к таблице</a>"; 
echo "<h1> </h1>"; 
?>
</form>
</body>
</html>