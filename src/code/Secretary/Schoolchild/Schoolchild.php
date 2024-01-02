<html>
<head>
<title>Школьники</title>
<link href="../../../materials/style/GeneralStyle.css" rel="stylesheet">
<link href="../../../materials/icon/schoolicon.ico" rel="icon" type='mage/x-icon'>
</head>
<ul>
<li><a href="../SecretaryMenu.php">Главная</a></li>
<li><a href="./Schoolchild.php">Школьники</a></li>
<li><a href="../Teacher/Teacher.php">Учителя</a></li>
<li><a href="../ListOfClass/Class.php">Классы</a></li>
<li><a href="../ListOfClub/Club.php">Кружки</a></li>
<li><a href="../ListOfSubject/Subject.php">Предметы</a></li>
<li><a href="../../../Authorization.php">Выход</a></li>
</ul>
<p><strong><h1><center>Страница с информацией о школьниках</center></strong></h1></p>
<center>
<img src="../../../materials/images/schoolchild1.png" width="100" height="100" >
</center><br>
<p><h4><center><img src="../../../materials/images/search.png" width="20" height="20" ><a href='./FindSchoolchild.php'>Поиск</a>&nbsp</center></h4></p>
<h3> </h3>
<?php
$mysql = new mysqli('mysql', 'user', 'password', 'school');
if (!$mysql){
	die("Error connect to data base");
}
$query="SELECT COUNT(*) FROM schoolchild";
$res=$mysql->query($query);
if ($row = $res->fetch_row())
	print('<p><h3><center> Текущее количество школьников:  ' . $row[0] . '  школьников');
mysqli_free_result($res);
?>
<h1> </h1>
<?php
$flag=0;
echo "<table border=0 cellpadding=5 cellspacing=5 align=center>";
echo "<tr align=center valign=middle bgcolor=#2d5787 style='color:#ffffff'><td>id Школьника</td><td>Фамилия</td><td>Имя</td><td>Отчество</td><td>Адрес</td><td>Дата рождения</td><td> Класс </td><td>Буква класса</td><td>Родитель</td><td>Успеваемость</td></tr>"; 
$mysql = new mysqli('mysql', 'user', 'password', 'school');
if (!$mysql){
	die("Error connect to data base");
}
$result = $mysql->query("SELECT * FROM schoolchild");
while ($row = $result->fetch_assoc()) {
	if ($flag==0) {
		$flag=1;
		echo "<tr bgcolor=#f0f0f7 style='color:#182c88'>";
	} else {
		$flag=0;
		echo "<tr style='color:#182c88'>";
	}
	echo "<td>".$row['id_schoolchild']."</td>";
	echo "<td>".$row['surname']."</td>";
    echo "<td>".$row['first_name']."</td>";
    echo "<td>".$row['second_name']."</td>";
	echo "<td>".$row['address']."</td>";
	echo "<td>".$row['date_birth']."</td>";
	echo "<td>".$row['id_class']."</td>";
	echo "<td>".$row['id_character']."</td>";
	echo "<td><a href='Parent.php?id_schoolchild=".$row['id_schoolchild']."'>Информация о родителе</a></td>";	
	echo "<td><a href='Record.php?id_schoolchild=".$row['id_schoolchild']."'>Успеваемость</a></td>";
	echo "</tr>";
}
echo "</table>"; 
$mysql->close();
?>
</body>
</html>