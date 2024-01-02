<html>
<head>
<title>Расписание</title>
<link href="../../../materials/style/GeneralStyle.css" rel="stylesheet">
<link href="../../../materials/icon/schoolicon.ico" rel="icon" type='mage/x-icon'>
</head>
<ul>
<li><a href="../SecretaryMenu.php">Главная</a></li>
<li><a href="../Schoolchild/Schoolchild.php">Школьники</a></li>
<li><a href="../Teacher/Teacher.php">Учителя</a></li>
<li><a href="../ListOfClass/Class.php">Классы</a></li>
<li><a href="./Club.php">Кружки</a></li>
<li><a href="../ListOfSubject/Subject.php">Предметы</a></li>
<li><a href="../../../Authorization.php">Выход</a></li>
</ul>
<h1> </h1>
<p><strong><h1><center>Страница с расписанием кружков</center></strong></h1></p>
<h1> </h1>
<center><img src="../../../materials/images/club1.png" width="100" height="100" ></center>
<h1> </h1>
<?php
$conn_id=new mysqli('mysql', 'user', 'password', 'school') or exit ();
?>
<?php
$flag=0;
echo "<table border=0 cellpadding=5 cellspacing=5 align=center>";
echo "<tr align=center valign=middle bgcolor=#2d5787 style='color:#ffffff'><td>Название</td><td>День недели</td><td>Время</td></tr>"; 
$result = mysqli_query($conn_id, 'SELECT club.name_club, timetable.Day_Week, timetable.Time FROM club LEFT JOIN timetable ON club.id_club = timetable.id_club') or exit ();
while ($row = mysqli_fetch_assoc($result)) {
	if ($flag==0) {
		$flag=1;
		echo "<tr bgcolor=#f0f0f7 style='color:#182c88'>";
	}
	else {
		$flag=0;
		echo "<tr style='color:#182c88'>";
	}
    echo "<td>".$row['name_club']."</td>";
	echo "<td>".$row['Day_Week']."</td>";
   	echo "<td>".$row['Time']."</td>";	
	echo "</tr>";
}
echo "</table>"; 
mysqli_close($conn_id);
?>
</body>
</html>