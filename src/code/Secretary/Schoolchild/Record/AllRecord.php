<html>
<head>
<title>Общая успеваемость</title>
<link href="../../../../materials/style/GeneralStyle.css" rel="stylesheet">
<link href="../../../../materials/icon/schoolicon.ico" rel="icon" type='mage/x-icon'>
</head>
<ul>
<li><a href="../../SecretaryMenu.php">Главная</a></li>
<li><a href="../Schoolchild.php">Школьники</a></li>
<li><a href="../../Teacher/Teacher.php">Учителя</a></li>
<li><a href="../../ListOfClass/Class.php">Классы</a></li>
<li><a href="../../ListOfClub/Club.php">Кружки</a></li>
<li><a href="../../ListOfSubject/Subject.php">Предметы</a></li>
<li><a href="../../../../Authorization.php">Выход</a></li>
</ul>
<p><strong><h1><center>Страница с общей успеваемостью школьника</center></strong></h1></p>
<center><img src="../../../../materials/images/record.png" width="100" height="100"></center>
<?php 
$id = (int)$_GET['id_schoolchild'];
$conn_id=new mysqli('mysql', 'user', 'password', 'school');;
$flag=0;
echo "<table border=0 cellpadding=5 cellspacing=5 align=center>";
echo "<tr align=center valign=middle bgcolor=#2d5787 style='color:#ffffff'><td>Фамилия</td><td>Имя</td><td>Предмет</td><td>Название оценки</td><td>Оценка</td></tr>"; 
$result = mysqli_query($conn_id, "SELECT schoolchild.surname, schoolchild.first_name, subject.name_subject, mark.name_mark, academicrecord.mark FROM schoolchild LEFT JOIN school.academicrecord ON schoolchild.id_schoolchild = academicrecord.id_schoolchild LEFT JOIN school.mark ON academicrecord.id_mark = mark.id_mark LEFT JOIN school.subject ON academicrecord.id_subject = subject.id_subject WHERE schoolchild.id_schoolchild =$id") or exit ();
while ($row = mysqli_fetch_assoc($result)) {
	if ($flag==0) {
		$flag=1;
		echo "<tr bgcolor=#f0f0f7 style='color:#182c88'>";
	} else {
		$flag=0; 
		echo "<tr style='color:#182c88'>";
	}
	echo "<td>".$row['surname']."</td>";
    echo "<td>".$row['first_name']."</td>";
    echo "<td>".$row['name_subject']."</td>";
	echo "<td>".$row['name_mark']."</td>";
	echo "<td>".$row['mark']."</td>";
	echo "</tr>";
}
echo "</table>"; 
mysqli_close($conn_id);
?>