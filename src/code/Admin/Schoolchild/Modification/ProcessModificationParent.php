<html>
<head>
<title>Изменение...</title>
<link href="../../../../materials/style/AuthorizationStyle.css" rel="stylesheet" type="text/css">
<link href="../../../../materials/icon/schoolicon.ico" rel="icon" type='mage/x-icon'>
</head>
<body>
<form class="box">
<?php
$mysql = mysqli_connect('mysql', 'user', 'password', 'school');
if (!$mysql){
	echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
	exit;
}
if (isset($_POST["id_parent"])) {
	$id_schoolchild=$_POST['id_schoolchild'];
	$id_parent=$_POST['id_parent'];
	$surName= $_POST['surName'];
	$first_Name=$_POST['first_Name'];
	$last_Name= $_POST['last_Name'];
	$address=$_POST['address'];
	$degree_kinship=$_POST['degree_kinship'];
	$phone_number=$_POST['phone_number'];
	$query="SELECT relationship.id_relationship FROM relationship WHERE relationship.id_parent=$id_parent";
	$sq = mysqli_query($mysql, $query);
	$tank = mysqli_fetch_assoc($sq);
	$id_relationship = $tank['id_relationship'];
	$query="UPDATE `school`.`parent` SET `id_parent`='$id_parent' ,`surName`='$surName' ,`first_Name`= '$first_Name',`last_Name`='$last_Name' ,`address`='$address',`phone_number` ='$phone_number' WHERE `parent`.`id_parent` =$id_parent";
	$sql = mysqli_query($mysql,$query);
	$query="UPDATE `school`.`relationship` SET `id_relationship`= $id_relationship ,`id_schoolchild`='$id_schoolchild' ,`id_parent`='$id_parent',`degree_kinship`='$degree_kinship'  WHERE `relationship`.`id_parent` =$id_parent";
	$sql = mysqli_query($mysql, $query);
	if ($sql) {
		?><center><img src="../../../../materials/images/successful.png" width="100" height="100" ></center><br><?php
		echo '<p>Информация о родителе изменена!</p>';
	} else {
		?><center><img src="../../../../materials/images/error.png" width="100" height="100" ></center><br><?php
		echo '<p>Ошибка обновления!"' . mysqli_error($mysql) . '</p>';
	}
} else { 
	?><center><img src="../../../../materials/images/error.png" width="100" height="100" ></center><br><?php
	echo '<p>Ошибка!</p>';
}
echo "<hr />";
echo '<thead>';
echo '<tr>';
$mysql->close();
?>
<br><h4><center><a href='../Schoolchild.php'> Вернутся к таблице школьников</a></center></h4>
</form>
</body>
</html>