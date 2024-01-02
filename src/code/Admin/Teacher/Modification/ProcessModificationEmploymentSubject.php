
<html lang="ru">
<head>
<meta charset="UTF-8">
<title>Обновление...</title>
<link href="../../../../materials/style/AuthorizationStyle.css" rel="stylesheet" type="text/css">
<link href="../../../../materials/icon/schoolicon.ico" rel="icon" type='mage/x-icon'>
</head>
<body>
<form class="box">
<?php
$mysql = new mysqli('mysql', 'user', 'password', 'school') or exit ();
$id_teacher=$_POST['id_teacher'];
$id_teaching=$_POST['id_teaching'];
$id_class= $_POST['id_class'];
$id_character=$_POST['id_character'];
$name_subject=$_POST['name_subject'];
$query="UPDATE `school`.`teaching` SET `id_teacher`= $id_teacher ,`id_subject`=$name_subject,`id_class`=$id_class ,`id_teaching`=$id_teaching, `id_academicyear`= '1',`id_character`='$id_character' WHERE `id_teaching`=$id_teaching";
$res=$mysql->query($query);
if ($res){
  echo "<img src='../../../../materials/images/successful.png' width='150' height='150'>";
  echo '<center>Успешно!</center><br>';
  echo '<center>Изменен!</center><br>';
} else { 
  echo "<img src='../../../../materials/images/error.png' width='150' height='150'>";
  echo  'Error '. mysqli_error($mysql) . '</p>';
}
$mysql->close();
?>
<?php
echo "<a href='../EmploymentTeacher.php?id_teacher=".$id_teacher."'>Вернутся к таблице</a>"; 
echo "<h1> </h1>"; ?>
</form>
</body>