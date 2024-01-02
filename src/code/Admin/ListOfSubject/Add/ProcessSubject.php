
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
if (!$mysql) {
	die("Error connect to data base");
}
$name_subject=$_POST['name_subject'];
$query="INSERT INTO `school`.`subject` (`id_subject`, `name_subject`) VALUES (NULL, '{$name_subject}')";
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
<h4><center><a href='../Subject.php'> Вернутся к таблице </a></center></h4>
</form>
</body>
</html>