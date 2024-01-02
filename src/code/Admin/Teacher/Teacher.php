<html>
<head>
<title>Учителя</title>
<link href="../../../materials/style/GeneralStyle.css" rel="stylesheet">
<link href="../../../materials/icon/schoolicon.ico" rel="icon" type='mage/x-icon'>
</head>
<ul>
<li><a href="../AdminMenu.php">Главная</a></li>
<li><a href="../Schoolchild/Schoolchild.php">Школьники</a></li>
<li><a href="./Teacher.php">Учителя</a></li>
<li><a href="../ListOfClass/Class.php">Классы</a></li>
<li><a href="../ListOfClub/Club.php">Кружки</a></li>
<li><a href="../ListOfSubject/Subject.php">Предметы</a></li>
<li><a href="../../../Authorization.php">Выход</a></li>
</ul>
<p><strong><h1><center>Страница с информацией об учителях</center></strong></h1></p>
<center><img src="../../../materials/images/teacher.png" width="100" height="100" ></center>
<p><h4><center><img src="../../../materials/images/search.png" width="20" height="20" ><a href='./FindTeacher.php'>Поиск</a>&nbsp<img src="../../../materials/images/add.png" width="20" height="20" ><a href='./Add/AddTeacher.php'>Добавление</a>&nbsp <img src="../../../materials/images/change.png" width="20" height="20" ><a href='./Modification/TeacherForChange.php'>Обновление</a> &nbsp <img src="../../../materials/images/delete.png" width="20" height="20" ><a href='./Delete/DeleteTeacher.php'>Удаление</a></center></h4></p>
<h1> </h1>
<?php
$conn_id=new mysqli('mysql', 'user', 'password', 'school') or exit ();
$result_id = mysqli_query($conn_id, 'SELECT COUNT(*) FROM teacher') or exit();
If ($row = mysqli_fetch_row($result_id))
	print ('<p><center><h3>Текущее количество учителей:  ' . $row[0] . '  учителей');
mysqli_free_result ($result_id);
?>
<h1> </h1>
<?php
$flag=0;
echo "<table border=0 cellpadding=5 cellspacing=5 align=center>";
echo "<tr align=center valign=middle bgcolor=#2d5787 style='color:#ffffff'><td>id учитель</td><td>Фамилия</td><td>Имя</td><td>Отчество</td><td>Классное руководство</td><td>Телефон</td><td>Дата рождения</td><td>Занятость</td></tr>"; 
$result = mysqli_query($conn_id, 'SELECT * FROM teacher') or exit ();
while ($row = mysqli_fetch_assoc($result)) {
	if ($flag==0) {
		$flag=1;
		echo "<tr bgcolor=#f0f0f7 style='color:#182c88'>";
	} else {
		$flag=0;
		echo "<tr style='color:#182c88'>";
	}
	echo "<td>".$row['id_teacher']."</td>";	
	echo "<td>".$row['Surname']."</td>";
    echo "<td>".$row['First_name']."</td>";
    echo "<td>".$row['Second_name']."</td>";
	echo "<td>".$row['class_guide']."</td>";
	echo "<td>".$row['number_phone']."</td>";
	echo "<td>".$row['data_birth']."</td>";
	echo "<td><a href='./EmploymentTeacher.php?id_teacher=".$row['id_teacher']."'>Информация о занятости</a></td>";
}
echo "</table>"; 
mysqli_close($conn_id);
?>
</body>
</html>