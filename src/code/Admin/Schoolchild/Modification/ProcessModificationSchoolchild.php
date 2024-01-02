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
if (isset($_POST["id_schoolchild"])) {
	$id_schoolchild=$_POST['id_schoolchild'];
	$surname=$_POST['surname'];
	$first_name=$_POST['first_name'];
	$second_name=$_POST['second_name'];
	$address=$_POST['address'];
	$date_birth=$_POST['date_birth'];
	$id_class=$_POST['id_class'];
	$id_character=$_POST['id_character'];
	$query="UPDATE `school`.`schoolchild` SET `id_schoolchild`='$id_schoolchild' ,`surname`='$surname' ,`first_name`= '$first_name',`second_name`='$second_name' ,`address`='$address' ,`date_birth`='$date_birth' ,`id_class` ='$id_class',`id_character`='$id_character' WHERE `schoolchild`.`id_schoolchild` =$id_schoolchild";
	$sql = mysqli_query($mysql, $query);
	if ($sql) {
		echo "<img src='../../../../materials/images/successful.png' width='150' height='150'>";
		echo '<p>Информация изменена!</p>';
	} else {
		echo "<img src='../../../../materials/images/error.png' width='150' height='150'>";
		echo '<p>Ошибка!"' . mysqli_error($mysql) . '</p>';
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