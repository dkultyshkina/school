<html>
<head>
<title>Классы</title>
<link href="../../../materials/style/GeneralStyle.css" rel="stylesheet">
<link href="../../../materials/icon/schoolicon.ico" rel="icon" type='mage/x-icon'>
</head>
<ul>
<li><a href="../AdminMenu.php">Главная</a></li>
<li><a href="../Schoolchild/Schoolchild.php">Школьники</a></li>
<li><a href="../Teacher/Teacher.php">Учителя</a></li>
<li><a href="./Class.php">Классы</a></li>
<li><a href="../ListOfClub/Club.php">Кружки</a></li>
<li><a href="../ListOfSubject/Subject.php">Предметы</a></li>
<li><a href="../../../Authorization.php">Выход</a></li>
</ul>
<p><strong><h1><center>Страница с информацией о классах и классных руководителях</center></strong></h1></p>
<center><img src="../../../materials/images/class.png" width="120" height="80" ></center>
<p><h4><center><img src="../../../materials/images/add.png" width="20" height="20" ><a href='Add/AddClass.php'>Добавление</a>&nbsp <img src="../../../materials/images/change.png" width="20" height="20" ><a href='./Modification/ClassForChange.php'>Обновление</a> &nbsp <img src="../../../materials/images/delete.png" width="20" height="20" ><a href='./Delete/DeleteClass.php'>Удаление</a></center></h4></p>
<h1></h1><center><img src="../../../materials/images/search.png" width="20" height="20" ><a href='FindClass.php'>Поиск</a></center>
<?php
$conn_id=new mysqli('mysql', 'user', 'password', 'school') or exit ();
$result_id = mysqli_query($conn_id, 'SELECT COUNT(*) FROM class WHERE (class.id_academicyear =1)') or exit ();
If ($row = mysqli_fetch_row ($result_id))
	print('<p><center><h3> Текущее количество классов:  ' . $row[0] . '  классов');
mysqli_free_result ($result_id);
?>
<?php
$flag=0;
echo "<table border=0 cellpadding=5 cellspacing=5 align=center>";
echo "<tr align=center valign=middle bgcolor=#2d5787 style='color:#ffffff'><td>Класс</td><td>Буква</td><td>Фамилия</td><td>Имя</td><td>Отчество</td><td>Состав класса</td><td>Предметы и учителя</td></tr>"; 
$result = mysqli_query($conn_id, 'SELECT class.id_class, class.id_character, teacher.surname, teacher.first_name, teacher.second_name FROM class LEFT JOIN school.teacher ON class.id_teacher = teacher.id_teacher WHERE (class.id_academicyear =1)') or exit ();
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
	echo "<td><a href='ListClass.php?id_class=".$row['id_class']."&id_character=".$row['id_character']."'>Информация о составе класса</a></td>";
	echo "<td><a href='ListTeacher.php?id_class=".$row['id_class']."&id_character=".$row['id_character']."'>Информация о предметах и учителях</a></td>";
	echo "</tr>";
}
echo "</table>"; 
mysqli_close($conn_id);
?>
</body>
</html>