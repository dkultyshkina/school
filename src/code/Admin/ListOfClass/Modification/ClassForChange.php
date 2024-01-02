<html>
<head>
<title>Обновление</title>
<link href="../../../../materials/style/GeneralStyle.css" rel="stylesheet">
<link href="../../../../materials/icon/schoolicon.ico" rel="icon" type='mage/x-icon'>
</head>
<ul>
<li><a href="../../AdminMenu.php">Главная</a></li>
<li><a href="../../Schoolchild/Schoolchild.php">Школьники</a></li>
<li><a href="../../Teacher/Teacher.php">Учителя</a></li>
<li><a href="../Class.php">Классы</a></li>
<li><a href="../../ListOfClub/Club.php">Кружки</a></li>
<li><a href="../../ListOfSubject/Subject.php">Предметы</a></li>
<li><a href="../../../../Authorization.php">Выход</a></li>
</ul>
<p><strong><h1><center>Страница с обновлением</center></strong></h1></p>
<center><img src="../../../../materials/images/change.png" width="50" height="50" ></center>
<h1></h1>
<?php
$conn_id=new mysqli('mysql', 'user', 'password', 'school') or exit ();
$flag=0;
echo "<table border=0 cellpadding=5 cellspacing=5 align=center>";
echo "<tr align=center valign=middle bgcolor=#2d5787 style='color:#ffffff'><td>Класс</td><td>Буква</td><td>Фамилия</td><td>Имя</td><td>Отчество</td><td>Обновление</td></tr>"; 
$result = mysqli_query($conn_id, 'SELECT class.id_counter, class.id_class, class.id_character, teacher.surname, teacher.first_name, teacher.second_name FROM class LEFT JOIN school.teacher ON class.id_teacher = teacher.id_teacher WHERE (class.id_academicyear =1)') or exit ();
while ($row = mysqli_fetch_assoc($result)) {
	if ($flag==0) {
		$flag=1;
		echo "<tr bgcolor=#f0f0f7 style='color:#182c88'>";
	} else {
		$flag=0;
		echo "<tr style='color:#182c88'>";
	}
	echo "<td>".$row['id_class']."</td>";	
	echo "<td>".$row['id_character']."</td>";
	echo "<td>".$row['surname']."</td>";
    echo "<td>".$row['first_name']."</td>";
    echo "<td>".$row['second_name']."</td>";
	echo "<td><a href='ModificationClass.php?id_counter=".$row['id_counter']."'>Обновление</a></td>";
	echo "</tr>";
}
echo "</table>"; 
mysqli_close($conn_id);
?>
</body>
</html>