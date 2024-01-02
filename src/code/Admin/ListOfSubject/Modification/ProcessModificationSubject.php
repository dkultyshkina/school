<html>
<head>
<title>Изменение...</title>
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
if (isset($_POST["id_subject"])) {
	$id=$_POST['id'];
	$id_subject=$_POST['id_subject'];
	$name_subject=$_POST['name_subject'];
	$query="UPDATE `school`.`subject` SET `id_subject`='$id_subject' ,`name_subject`='$name_subject' WHERE `subject`.`id_subject`=$id";
	$sql = mysqli_query($mysql, $query);
	if ($sql) {
		echo "<img src='../../../../materials/images/successful.png' width='150' height='150'>";
		echo '<p>Информация изменена</p>';
	} else {
		echo "<img src='../../../../materials/images/error.png' width='150' height='150'>";	
		echo '<p>Ошибка изменения!"' . mysqli_error($mysql) . '</p>';
	}
}
echo "<hr />";
echo '<thead>';
echo '<tr>';
$mysql->close();
?>
<br><h4><center><a href='../Subject.php'> Вернутся к таблице </a></center></h4>
</form>
</body>
</html>