<html>
<head>
<title>Удаление...</title>
<link href="../../../../materials/style/AuthorizationStyle.css" rel="stylesheet" type="text/css">
<link href="../../../../materials/icon/schoolicon.ico" rel="icon" type='mage/x-icon'>
</head>
<body>
<form action="" class = "box">
<?php
$mysql = new mysqli('mysql', 'user', 'password', 'school');
if (!$mysql){
	die("Error connect to data base");
}
if (isset($_GET["id_schoolchild"])){
  $id_schoolchild=$_GET['id_schoolchild'];
  $query="DELETE FROM schoolchild WHERE id_schoolchild = $id_schoolchild";
  $res=$mysql->query($mysql, $query);
  if ($res){
    echo "<img src='../../../../materials/images/successful.png' width='150' height='150'>";
    echo '<center>Успешно! Школьник удален </center><br>';
  } else {
    echo "<img src='../../../../materials/images/error.png' width='150' height='150'>";
    echo  'Error ';
  }
  $mysql->close();}
?>
<br><h4><center><a href='../Schoolchild.php'> Вернутся к таблице </a></center></h4>
</form>
</body>
</html>