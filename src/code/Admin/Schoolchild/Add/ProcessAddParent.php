
<html lang="ru">
<head>
<meta charset="UTF-8">
<title>Добавление...</title>
<link href="../../../../materials/style/AuthorizationStyle.css" rel="stylesheet" type="text/css">
<link href="../../../../materials/icon/schoolicon.ico" rel="icon" type='mage/x-icon'>
</head>
<body>

<form class="box">
<?php
$mysql = new mysqli('mysql', 'user', 'password', 'school');
if (!$mysql){
	die("Error connect to data base");
}
$id_schoolchild=$_POST['id_schoolchild'];
$id_parent=$_POST['id_parent'];
$surName= $_POST['surName'];
$first_Name=$_POST['first_Name'];
$last_Name= $_POST['last_Name'];
$address=$_POST['address'];
$degree_kinship=$_POST['degree_kinship'];
$phone_number=$_POST['phone_number'];
$query="INSERT INTO `school`.`parent` (`id_parent`, `surName`, `first_Name`, `last_Name`, `address`, `phone_number`) VALUES ('{$id_parent}', '{$surName}', '{$first_Name}', '{$last_Name}', '{$address}', '{$phone_number}')";
$res=$mysql->query($query);
if ($res){
  ?><center><img src="../../../../materials/images/successful.png" width="100" height="100" ></center><br><?php
  echo '<center>Успешно!</center><br>';
  echo '<center>Родитель добавлен!</center><br>';
}else {?><center><img src="../../../../materials/images/error.png" width="100" height="100" ></center><br><?php
echo  'Error '. mysqli_error($mysql) . '</p>';}

$query="INSERT INTO `school`.`relationship` (`id_relationship`, `id_schoolchild`, `id_parent`, `degree_kinship`) VALUES (NULL, '{$id_schoolchild}', '{$id_parent}', '{$degree_kinship}')";
$res=$mysql->query($query);
echo "<h4><center><a href='../Parent.php?id_schoolchild=".$id_schoolchild."'> Вернутся к таблице родителя</a></center></h4>";
$mysql->close();
?>
</form>
</body>
</html>