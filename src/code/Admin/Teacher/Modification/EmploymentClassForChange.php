<html lang="ru">
<head>
<meta charset="UTF-8">
<title>Обновление</title>
<link href="../../../../materials/style/GeneralStyle.css" rel="stylesheet">
<link href="../../../../materials/icon/schoolicon.ico" rel="icon" type='mage/x-icon'>
</head>
<ul>
<li><a href="../../AdminMenu.php">Главная</a></li>
<li><a href="../../Schoolchild/Schoolchild.php">Школьники</a></li>
<li><a href="../Teacher.php">Учителя</a></li>
<li><a href="../../ListOfClass/Class.php">Классы</a></li>
<li><a href="../../ListOfClub/Club.php">Кружки</a></li>
<li><a href="../../ListOfSubject/Subject.php">Предметы</a></li>
<li><a href="../../../../Authorization.php">Выход</a></li>
</ul>
<h1> </h1>
<?php $id = (int)$_GET['id_teacher'];  ?>
<h1> </h1>
<p><strong><h1><center>Обновление занятости учителя</center></strong></h1></p>
<center><img src="../../../../materials/images/change.png" width="70" height="70" ></center>
<center><h3>Классное руководство </h3></center>
<?php
$conn_id = new mysqli('mysql', 'user', 'password', 'school') or exit ();
$flag=0;
echo "<table border=0 cellpadding=5 cellspacing=5 align=center>";
echo "<tr align=center valign=middle bgcolor=#2d5787 style='color:#ffffff'><td>id учитель</td><td>Фамилия</td><td>Имя</td><td>Отчество</td><td>Класс</td><td>Буква</td><td>Обновление</td></tr>"; 
$id = (int)$_GET['id_teacher']; 
$query ="SELECT teacher.id_teacher, teacher.Surname, teacher.First_name, teacher.Second_name, class.id_counter, class.id_class, class.id_character FROM teacher LEFT JOIN school.class ON teacher.id_teacher = class.id_teacher WHERE ((teacher.id_teacher = $id) AND (class.id_academicyear = 1))";
$result = mysqli_query($conn_id, $query) or exit ();
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
	echo "<td>".$row['id_class']."</td>";
	echo "<td>".$row['id_character']."</td>";
	echo "<td><a href='ModificationEmploymentClass.php?id_counter=".$row['id_counter']."&id_teacher=".$row['id_teacher']."'>Обновление</a></td>";
}
echo "</table>"; 
mysqli_close($conn_id);
?>
</body>
</html>