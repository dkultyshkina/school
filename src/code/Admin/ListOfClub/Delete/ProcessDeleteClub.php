<html>
<head>
<title>Удаление</title>
<link href="../../../../materials/style/AuthorizationStyle.css" rel="stylesheet" type="text/css">
<link href="../../../../materials/icon/schoolicon.ico" rel="icon" type='mage/x-icon'>
</head>
<body>
<form class = "box">
<?php
$mysql = new mysqli('mysql', 'user', 'password', 'school');
if (!$mysql){
	die("Error connect to data base");
}
if (isset($_GET["id_club"])) {
	$id_club=$_GET["id_club"];
	$query="DELETE FROM club WHERE club.id_club=$id_club";
	$res=$mysql->query($query);
	if ($res){
  		echo "<img src='../../../../materials/images/successful.png' width='150' height='150'>";
  		echo '<center>Успешно! Удалено </center><br>';
	} else {
		echo "<img src='../../../../materials/images/error.png' width='150' height='150'>";
		echo  'Ошибка'.mysqli_error($mysql).'</p>';
	}
} else {
	echo "<img src='../../../../materials/images/error.png' width='150' height='150'>";
	echo "Ошибка".mysqli_error($mysql).'</p>';
}
$mysql->close();
?>
<br><h4><center><a href='../Club.php'>Вернутся к странице</a></center></h4>
</form>
</body>
</html>