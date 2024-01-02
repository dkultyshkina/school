<html>
<head>
<title>Изменение...</title>
<link href="../../../../materials/style/AuthorizationStyle.css" rel="stylesheet" type="text/css">
<link href="../../../../materials/icon/schoolicon.ico" rel="icon" type='mage/x-icon'>
</head>
<body>
<form action="" class = "box">
<?php
$mysql = new mysqli('mysql', 'user', 'password', 'school') or exit ();
if (!$mysql) {
	echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
	exit;
}
if (isset($_POST["id_teacher"])) {
	$id_teacher=$_POST['id_teacher'];
	$Surname= $_POST['Surname'];
	$First_name=$_POST['First_name'];
	$Second_name= $_POST['Second_name'];
	$class_guide=$_POST['class_guide'];
	$number_phone=$_POST['number_phone'];
	$data_birth=$_POST['data_birth'];
	$query="UPDATE `school`.`teacher` SET `id_teacher`='$id_teacher' ,`Surname`='$Surname' ,`First_name`= '$First_name',`Second_name`='$Second_name' ,`class_guide`='$class_guide' ,`number_phone` ='$number_phone', `data_birth`='$data_birth'  WHERE `teacher`.`id_teacher` =$id_teacher";
	$sql = mysqli_query($mysql,$query);
	if ($sql) {
		echo "<img src='../../../../materials/images/successful.png' width='150' height='150'>";
		echo '<p>Информация обновления в таблице!</p>';
	} else {
		echo "<img src='../../../../materials/images/error.png' width='150' height='150'>";
		echo '<p>Ошибка обновления!' . mysqli_error($mysql) . '</p>';
	}
}
echo "<hr />";
echo '<thead>';
echo '<tr>';
$mysql->close();
?>
<br><h4><center><a href='../Teacher.php'> Вернутся к таблице</a></center></h4>
</form>
</body>
</html>