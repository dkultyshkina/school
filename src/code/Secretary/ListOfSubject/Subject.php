<html>
<head>
<title>Предметы</title>
<link href="../../../materials/style/GeneralStyle.css" rel="stylesheet">
<link href="../../../materials/icon/schoolicon.ico" rel="icon" type='mage/x-icon'>
</head>
<ul>
<li><a href="../SecretaryMenu.php">Главная</a></li>
<li><a href="../Schoolchild.php">Школьники</a></li>
<li><a href="../Teacher/Teacher.php">Учителя</a></li>
<li><a href="../ListOfClass/Class.php">Классы</a></li>
<li><a href="../ListOfClub/Club.php">Кружки</a></li>
<li><a href="./Subject.php">Предметы</a></li>
<li><a href="../../../Authorization.php">Выход</a></li>
</ul>
<p><strong><h1><center>Страница с информацией о предметах</center></strong></h1></p>
<center><img src="../../../materials/images/subject.png" width="80" height="80" ></center>
<h1></h1>
<?php
$conn_id=new mysqli('mysql', 'user', 'password', 'school') or exit ();
$result_id = mysqli_query($conn_id, 'SELECT COUNT(*) FROM subject') or exit ();
If ($row = mysqli_fetch_row($result_id))
	print('<p><h3><center> Текущее количество предметов:  ' . $row[0] . '  предметов');
mysqli_free_result($result_id);
?>
<h2> </h2>
<?php
$flag=0;
echo "<table border=0 cellpadding=5 cellspacing=5 align=center>";
echo "<tr align=center valign=middle bgcolor=#2d5787 style='color:#ffffff'><td>id Предмета</td><td>Название предмета</td></tr>"; 
$result = mysqli_query($conn_id, 'SELECT * FROM subject GROUP BY id_subject') or exit ();
while ($row = mysqli_fetch_assoc($result)) {
	if ($flag==0) {
		$flag=1;
		echo "<tr bgcolor=#f0f0f7 style='color:#182c88'>";
	} else {
		$flag=0;
		echo "<tr style='color:#182c88'>";
	}
	echo "<td>".$row['id_subject']."</td>";
	echo "<td>".$row['name_subject']."</td>";
	echo "";	
	echo "</tr>";
}
echo "</table>"; 
mysqli_close($conn_id);
?>
</body>
</html>