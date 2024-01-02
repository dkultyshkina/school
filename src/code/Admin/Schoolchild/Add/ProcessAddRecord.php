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
$name_subject=$_POST['name_subject'];
$name_mark= $_POST['name_mark'];
$mark=$_POST['mark'];
$query="INSERT INTO `school`.`academicrecord` (`id_schoolchild`, `id_subject`, `id_academicrecord`, `id_academicyear`, `id_mark`, `mark`) VALUES ($id_schoolchild, $name_subject, NULL, '1', $name_mark, $mark);";
$res=$mysql->query($query);
if ($res){
  ?><center><img src="../../../../materials/images/successful.png" width="100" height="100" ></center><br><?php
  echo '<center>Успешно!</center><br>';
  echo '<center>Добавлено!</center><br>';
}else {
  ?><center><img src="../../../../materials/images/error.png" width="100" height="100" ></center><br><?php
  echo  'Error '. mysqli_error($mysql) . '</p>';
}
echo "<h4><center><a href='../Record.php?id_schoolchild=".$id_schoolchild."'> Вернутся к таблице успеваемости</a></center></h4>";
$mysql->close();
?>
</form>
</body>
</html>