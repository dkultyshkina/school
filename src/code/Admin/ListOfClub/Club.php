<html>
<head>
<title>Кружки</title>
<link href="../../../materials/style/GeneralStyle.css" rel="stylesheet">
<link href="../../../materials/icon/schoolicon.ico" rel="icon" type='mage/x-icon'>
</head>
<ul>
<li><a href="../AdminMenu.php">Главная</a></li>
<li><a href="../Schoolchild/Schoolchild.php">Школьники</a></li>
<li><a href="../Teacher/Teacher.php">Учителя</a></li>
<li><a href="../ListOfClass/Class.php">Классы</a></li>
<li><a href="./Club.php">Кружки</a></li>
<li><a href="../ListOfSubject/Subject.php">Предметы</a></li>
<li><a href="../../../Authorization.php">Выход</a></li>
</ul>
<p><strong><h1><center>Страница с информацией о кружках</center></strong></h1></p>
<h1> </h1>
<center><img src="../../../materials/images/schoolchild.png" width="80" height="80" ></center>
<center><ul><p><h4><img src="../../../materials/images/timetable.png" width="20" height="20" ><a href='TimetableClub.php'>Расписание</a></ul></center>
<center><ul><img src="../../../materials/images/add.png" width="20" height="20" ><a href='./Add/AddClub.php'>Добавление</a>&nbsp <img src="../../../materials/images/change.png" width="20" height="20" ><a href='./Modification/ClubForChange.php'>Обновление</a> &nbsp <img src="../../../materials/images/delete.png" width="20" height="20" ><a href='./Delete/DeleteClub.php'>Удаление</a></center></h3></p></ul></center>
<h1></h1>
<center><h4><img src="../../../materials/images/search.png" width="20" height="20" ><a href='./FindClub.php'>Поиск</a></center>
<?php
$conn_id=new mysqli('mysql', 'user', 'password', 'school') or exit ();
$result_id = mysqli_query($conn_id, 'SELECT COUNT(*) FROM club') or exit ();
If ($row = mysqli_fetch_row($result_id))
	print('<p><h3><center> Текущее количество кружков:  ' . $row[0] . '  кружков');
mysqli_free_result($result_id);
?>
<h1> </h1>
<?php
$flag=0;
echo "<table border=0 cellpadding=5 cellspacing=5 align=center>";
echo "<tr align=center valign=middle bgcolor=#2d5787 style='color:#ffffff'><td>id кружок</td><td>Название</td><td>Преподаватель: Фамилия</td><td>Имя</td><td>Отчество</td><td>Цена</td><td>Список</td></tr>"; 
$result = mysqli_query($conn_id, 'SELECT club.id_club, club.name_club, teacher.surname, teacher.first_name, teacher.second_name, club.price FROM club LEFT JOIN school.teacher ON club.id_teacher = teacher.id_teacher') or exit ();
while ($row = mysqli_fetch_assoc($result)) {
	if ($flag==0) {
		$flag=1;
		echo "<tr bgcolor=#f0f0f7 style='color:#182c88'>";
	} else {
		$flag=0;
		echo "<tr style='color:#182c88'>";
	}
	echo "<td>".$row['id_club']."</td>";	
	echo "<td>".$row['name_club']."</td>";
	echo "<td>".$row['surname']."</td>";
    echo "<td>".$row['first_name']."</td>";
    echo "<td>".$row['second_name']."</td>";
	echo "<td>".$row['price']."</td>";
	echo "<td><a href='./ListClub.php?id_club=".$row['id_club']."'>Список участников</a></td>";
	echo "</tr>";
}
echo "</table>"; 
mysqli_close($conn_id);
?>
</body>
</html>