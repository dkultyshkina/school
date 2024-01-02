<html>
<head>
<title>Удаление</title>
<link href="../../../../materials/style/AuthorizationStyle.css" rel="stylesheet" type="text/css">
<link href="../../../../materials/icon/schoolicon.ico" rel="icon" type='mage/x-icon'>
</head>
<body>
<form class = "box">
<?php
$mysql = new mysqli('mysql', 'user', 'password', 'school');
if (!$mysql){
	die("Error connect to data base");
}
if (isset($_GET["id_parent"])){
  $id_parent=$_GET['id_parent'];
  $query="DELETE FROM parent WHERE id_parent = $id_parent";
  $res=$mysql->query($query);
  if ($res){
    ?><center><img src="../../../../materials/images/successful.png" width="100" height="100" ></center><br><?php
    echo '<center>Успешно! Родитель удален </center><br>';
  } else {
    ?><center><img src="../../../../materials/images/error.png" width="100" height="100" ></center><br><?php
    echo  'Ошибка'.mysqli_error($mysql).'</p>';
  }
} else {
  echo "Ошибка".mysqli_error($mysql).'</p>';
}
$query="DELETE FROM relationship WHERE id_parent = $id_parent";
$res=$mysql->query($query);
$mysql->close();
?>
<br><h4><center><a href='../Schoolchild.php'>Вернутся к странице школьников</a></center></h4>
</form>
</body>
</html>