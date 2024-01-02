<html>
<head>
<title>Изменение информации о школьниках</title>
<link href="../../../../materials/style/GeneralStyle.css" rel="stylesheet">
<link href="../../../../materials/icon/schoolicon.ico" rel="icon" type='mage/x-icon'>
</head>
<ul>
<li><a href="../../AdminMenu.php">Главная</a></li>
<li><a href="../Schoolchild.php">Школьники</a></li>
<li><a href="../../Teacher/Teacher.php">Учителя</a></li>
<li><a href="../../ListOfClass/Class.php">Классы</a></li>
<li><a href="../../ListOfClub/Club.php">Кружки</a></li>
<li><a href="../../ListOfSubject/Subject.php">Предметы</a></li>
<li><a href="../../../../Authorization.php">Выход</a></li>
</ul>
<p><strong><h1><center>Изменение информации о школьниках</center></strong></h1></p>
<center><img src="../../../../materials/images/change.png" width="50" height="50" ></center>
<h1></h1>
<?php
$conn_id=new mysqli('mysql', 'user', 'password', 'school');
$flag=0;
echo "<table border=0 cellpadding=5 cellspacing=5 align=center>";
echo "<tr align=center valign=middle bgcolor=#2d5787 style='color:#ffffff'><td>id Школьника</td><td>Фамилия</td><td>Имя</td><td>Отчество</td><td>Адрес</td><td>Дата рождения</td><td> Класс </td><td>Буква класса</td><td>Изменить информацию</td></tr>"; 
$result = mysqli_query($conn_id, 'SELECT * FROM schoolchild') or exit ();
while ($row = mysqli_fetch_assoc($result)) {
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
	echo "<td><a href='./ModificationSchoolchild.php?id_schoolchild=".$row['id_schoolchild']."'>Изменение</a></td>";	
	echo "</tr>";
}
echo "</table>"; 
mysqli_close($conn_id);
?>