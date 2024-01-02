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
if (isset($_POST["id_academicrecord"])) {
	$id_academicrecord=$_POST['id_academicrecord'];
	$id_schoolchild=$_POST['id_schoolchild'];
	$name_subject=$_POST['name_subject'];
	$name_mark=$_POST['name_mark'];
	$mark=$_POST['mark'];
	$query="UPDATE `school`.`academicrecord` SET `id_schoolchild`='$id_schoolchild' ,`id_subject`='$name_subject' ,`id_academicrecord`= '$id_academicrecord',`id_mark`='$name_mark' ,`mark`='$mark'  WHERE `academicrecord`.`id_academicrecord` =$id_academicrecord";
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
echo "<h4><center><a href='../Record.php?id_schoolchild=".$id_schoolchild."'> Вернутся к таблице успеваемости</a></center></h4>";
$mysql->close();
?>
</form>
</body>
</html>