<html>
<head>
<title>Удаление</title>
<link href="../../../../materials/style/AuthorizationStyle.css" rel="stylesheet" type="text/css">
<link href="../../../../materials/icon/schoolicon.ico" rel="icon" type='mage/x-icon'>
</head>
<body>
<form class = "box">
<?php
$mysql = new mysqli('mysql', 'user', 'password', 'school') or exit ();
if (isset($_GET["id_counter"])){
	$id_counter=$_GET["id_counter"];
	$query="DELETE FROM class WHERE class.id_counter=$id_counter";
	$res=$mysql->query($query);
	if ($res) {
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
<br><h4><center><a href='../Teacher.php'>Вернутся к странице учителей</a></center></h4>
</form>
</body>
</html>