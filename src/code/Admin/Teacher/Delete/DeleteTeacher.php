<html>
<head>
<title>Удаление ифнормации об учителях</title>
<link href="../../../../materials/icon/schoolicon.ico" rel="icon" type='mage/x-icon'>
<link href="../../../../materials/style/GeneralStyle.css" rel="stylesheet">
</head>
<ul>
<li><a href="../../AdminMenu.php">Главная</a></li>
<li><a href="../../Schoolchild/Schoolchild.php">Школьники</a></li>
<li><a href="../Teacher.php">Учителя</a></li>
<li><a href="../../ListOfClass/Class.php">Классы</a></li>
<li><a href="../../ListOfClub/Club.php">Кружки</a></li>
<li><a href="../../ListOfSubject.php">Предметы</a></li>
<li><a href="../../../../Authorization.php">Выход</a></li>
</ul>
<p><strong><h1><center>Удаление информации об учителях</center></strong></h1></p>
<center><img src="../../../../materials/images/delete.png" width="80" height="80" ></center>
<h1></h1>
<?php
$conn_id=new mysqli('mysql', 'user', 'password', 'school') or exit ();
$flag=0;
echo "<table border=0 cellpadding=5 cellspacing=5 align=center>";
echo "<tr align=center valign=middle bgcolor=#2d5787 style='color:#ffffff'><td>id Учителя</td><td>Фамилия</td><td>Имя</td><td>Отчество</td><td>Классное руководство</td><td>Номер телефона</td><td>Дата рождения</td><td>Удаление учителя</td></tr>"; 
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
	echo "<td><a href='./ProcessDeleteTeacher.php?id_teacher=".$row['id_teacher']."'>Удаление</a></td>";	
	echo "</tr>";
}
echo "</table>"; 
mysqli_close($conn_id);
?>
