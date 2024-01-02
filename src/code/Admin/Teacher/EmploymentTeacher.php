<html lang="ru">
<head>
<meta charset="UTF-8">
<title>Занятость учителя</title>
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
<h1> </h1>
<?php $id = (int)$_GET['id_teacher']; ?>
<h1> </h1>
<p><strong><h1><center>Страница с информацией об занятости учителя</center></strong></h1></p>
<center><img src="../../../materials/images/busy.png" width="100" height="100" ></center>
<center><h3>Классное руководство </h3></center>
<?php
echo "<p><h4><center><img src='../../../materials/images/add.png' width='20' height='20' ><a href='./Add/AddEmploymentClass.php?id_teacher=".$id."'>Добавление</a>&nbsp <img src='../../../materials/images/change.png' width='20' height='20' ><a href='./Modification/EmploymentClassForChange.php?id_teacher=".$id."'>Обновление</a> &nbsp <img src='../../../materials/images/delete.png' width='20' height='20' ><a href='./Delete/DeleteEmploymentClass.php?id_teacher=".$id."'>Удаление</a></center></h4></p>";
$conn_id=new mysqli('mysql', 'user', 'password', 'school') or exit ();
$flag=0;
echo "<table border=0 cellpadding=5 cellspacing=5 align=center>";
echo "<tr align=center valign=middle bgcolor=#2d5787 style='color:#ffffff'><td>id учитель</td><td>Фамилия</td><td>Имя</td><td>Отчество</td><td>Класс</td><td>Буква</td></tr>"; 
$query ="SELECT teacher.id_teacher, teacher.Surname, teacher.First_name, teacher.Second_name, class.id_class, class.id_character FROM teacher LEFT JOIN school.class ON teacher.id_teacher = class.id_teacher WHERE ((teacher.id_teacher = $id) AND (class.id_academicyear = 1))";
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
}
echo "</table>"; 
mysqli_close($conn_id);
?>
<center><h3>Преподавание</h3></center>
<?php
echo "<p><h4><center><img src='../../../materials/images/add.png' width='20' height='20' ><a href='./Add/AddEmploymentSubject.php?id_teacher=".$id."'>Добавление</a>&nbsp <img src='../../../materials/images/change.png' width='20' height='20' ><a href='./Modification/EmploymentSubjectForChange.php?id_teacher=".$id."'>Обновление</a> &nbsp <img src='../../../materials/images/delete.png' width='20' height='20' ><a href='./Delete/DeleteEmploymentSubject.php?id_teacher=".$id."'>Удаление</a></center></h4></p>";
$conn_id=new mysqli('mysql', 'user', 'password', 'school') or exit ();
$flag=0;
echo "<table border=0 cellpadding=5 cellspacing=5 align=center>";
echo "<tr align=center valign=middle bgcolor=#2d5787 style='color:#ffffff'><td>id учитель</td><td>Фамилия</td><td>Имя</td><td>Отчество</td><td>Класс</td><td>Буква</td><td>Предмет</td></tr>"; 
$id = (int)$_GET['id_teacher']; 
$query="SELECT teacher.id_teacher, teacher.Surname, teacher.First_name, teacher.Second_name, teaching.id_class, teaching.id_character, subject.name_subject FROM teacher LEFT JOIN school.teaching ON teacher.id_teacher = teaching.id_teacher  LEFT JOIN school.subject ON teaching.id_subject = subject.id_subject WHERE  teacher.id_teacher = $id";
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
	echo "<td>".$row['name_subject']."</td>";
}
echo "</table>"; 
mysqli_close($conn_id);
?>
<center><h3>Введение кружков</h3></center>
<?php
$conn_id=new mysqli('mysql', 'user', 'password', 'school') or exit ();
$flag=0;
echo "<table border=0 cellpadding=5 cellspacing=5 align=center>";
echo "<tr align=center valign=middle bgcolor=#2d5787 style='color:#ffffff'><td>id учитель</td><td>Фамилия</td><td>Имя</td><td>Отчество</td><td>Название кружка</td></tr>"; 
$id = (int)$_GET['id_teacher']; 
$result = mysqli_query($conn_id, "SELECT teacher.id_teacher, teacher.Surname, teacher.First_name, teacher.Second_name, club.name_club FROM teacher LEFT JOIN school.club ON teacher.id_teacher = club.id_teacher WHERE  (teacher.id_teacher = $id)") or exit ();
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
	echo "<td>".$row['name_club']."</td>";
}
echo "</table>"; 
mysqli_close($conn_id);
?>
</body>
</html>