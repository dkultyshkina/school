<html>
<head>
<title>Удаление...</title>
<link href="../../../../materials/style/AuthorizationStyle.css" rel="stylesheet" type="text/css">
<link href="../../../../materials/icon/schoolicon.ico" rel="icon" type='mage/x-icon'>
</head>
<body>
<form action="" class = "box">
<?php
$mysql = mysqli_connect('mysql', 'user', 'password', 'school');
if (!$mysql){
	echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
	exit;
}
if (isset($_GET["id_academicrecord"])) {
	$id_academicrecord=$_GET['id_academicrecord'];
	$query="DELETE FROM `school`.`academicrecord` WHERE `academicrecord`.`id_academicrecord` = $id_academicrecord";
	$sql = mysqli_query($mysql, $query);
	if ($sql) {
		echo "<img src='../../../../materials/images/successful.png' width='150' height='150'>";
		echo '<p>Удалено успешно</p>';
	} else {
		echo "<img src='../../../../materials/images/error.png' width='150' height='150'>";	
		echo '<p>Ошибка удаления!"' . mysqli_error($mysql) . '</p>';
	}
}
echo "<hr />";
echo '<thead>';
echo '<tr>';
$mysql->close();
?>
<br><h4><center><a href='../Schoolchild.php'> Вернутся к таблице </a></center></h4>
</form>
</body>
</html>