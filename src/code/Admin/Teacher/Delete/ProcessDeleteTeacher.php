<html>
<head>
<title>Удаление...</title>
<link href="../../../../materials/style/AuthorizationStyle.css" rel="stylesheet" type="text/css">
<link href="../../../../materials/icon/schoolicon.ico" rel="icon" type='mage/x-icon'>
</head>
<body>
<form action="" class = "box">
<?php
$mysql = new mysqli('mysql', 'user', 'password', 'school') or exit ();
if (isset($_GET["id_teacher"])) {
	$id_teacher=$_GET['id_teacher'];
	$query="DELETE FROM teacher WHERE id_teacher = $id_teacher";
	$res=$mysql->query($query);
	if ($res) {
  		echo "<img src='../../../../materials/images/successful.png' width='150' height='150'>";
 		echo '<center>Успешно! Учитель удален </center><br>';
	} else {
		echo "<img src='../../../../materials/images/error.png' width='150' height='150'>";
		echo  'Error '.mysqli_error($mysql).'</p>';
	}
}
else {
	echo "Error".mysqli_error($mysql).'</p>';
}
$mysql->close();
?>
<br><h4><center><a href='../Teacher.php'>Вернутся на страницу учителей </a></center></h4>
</form>
</body>
</html>