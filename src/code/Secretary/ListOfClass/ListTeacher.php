<html lang="ru">
<head>
<meta charset="UTF-8">
<title>Занятость учителя</title>
<link href="../../../materials/style/GeneralStyle.css" rel="stylesheet">
<link href="../../../materials/icon/schoolicon.ico" rel="icon" type='mage/x-icon'>
</head>
<h1> </h1>
<p><strong><h1><center>Страница со списками предметов и их учителей</center></strong></h1></p>
<?php
$conn_id=new mysqli('mysql', 'user', 'password', 'school') or exit ();
$id_class = (int)$_GET['id_class']; 
$id_character = $_GET['id_character']; 
echo "<p><strong><h3><center>СПРАВКА</center></strong></h3></p>";
echo "<center>Об предметах и учителях</center>";
echo "<center>класса ".$id_class.$id_character."</center>";
$result = mysqli_query($conn_id, "SELECT academicyear.name_year FROM academicyear WHERE (academicyear.id_academicyear=1)") or exit ();
if ($row = mysqli_fetch_assoc($result)) {
	echo "<center>".$row['name_year']." учебного года</center>";
}
$flag=0;
echo "<table border=2px cellpadding=5 cellspacing=5 align=center>";
echo "<tr align=center valign=middle style='color:#000000'><td>id учитель</td><td>Фамилия</td><td>Имя</td><td>Отчество</td><td>Класс</td><td>Буква</td><td>Предмет</td></tr>"; 
$query="SELECT teacher.id_teacher, teacher.Surname, teacher.First_name, teacher.Second_name, teaching.id_class, teaching.id_character, subject.name_subject FROM teacher LEFT JOIN school.teaching ON teacher.id_teacher = teaching.id_teacher  LEFT JOIN school.subject ON teaching.id_subject = subject.id_subject WHERE  ((teaching.id_class=$id_class) AND (teaching.id_character='$id_character'))";
$result = mysqli_query($conn_id, $query) or exit ();
while ($row = mysqli_fetch_assoc($result)) {
	if ($flag==0) {
		$flag=1;
		echo "<tr bgcolor=#ffffff style='color:#000000'>";
	} else {
		$flag=0;
		echo "<tr style='color:#000000'>";
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
echo "<p align='right'>Подпись ________________ Директор Школы</p>";
$today = date("m.d.y");
echo "<p align='right'>".$today."</p>";
?>
</body>
</html>