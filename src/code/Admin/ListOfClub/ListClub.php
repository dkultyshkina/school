<html>
<head>
<title>Список участников кружка</title>
<link href="../../../materials/style/GeneralStyle.css" rel="stylesheet">
<link href="../../../materials/icon/schoolicon.ico" rel="icon" type='mage/x-icon'>
</head>
<body>
<p><strong><h3><center>Страница с информацией с участниками кружка</center></strong></h3></p>
<?php
$conn_id=new mysqli('mysql', 'user', 'password', 'school') or exit ();
$id = (int)$_GET['id_club']; 
echo "<p><strong><h3><center>СПРАВКА</center></strong></h3></p>";
echo "<center>о составе кружка </center>";
$result = mysqli_query($conn_id, "SELECT academicyear.name_year FROM academicyear WHERE academicyear.id_academicyear=1") or exit ();
if ($row = mysqli_fetch_assoc($result)) {
	echo "<center>".$row['name_year']." учебного года</center>";
}
$result = mysqli_query($conn_id, "SELECT club.name_club FROM club WHERE club.id_club=$id") or exit ();
if ($row = mysqli_fetch_assoc($result)) {
	echo "<center>состав кружка  ".$row['name_club']." </center>";
}
$query ="SELECT COUNT(schoolchild.id_schoolchild) FROM schoolchild LEFT JOIN school.listclub ON  schoolchild.id_schoolchild=listclub.id_schoolchild WHERE (listclub.id_club=$id)";
$result_id = mysqli_query($conn_id, $query) or exit ();
If ($row = mysqli_fetch_row ($result_id))
	print('<p><center> Текущее количество участников:  ' . $row[0] . '  человек');
mysqli_free_result ($result_id);
?>
<?php
$flag=0;
$id = (int)$_GET['id_club']; 
$query = "SELECT  schoolchild.id_schoolchild, schoolchild.surname, schoolchild.first_name, schoolchild.second_name FROM schoolchild LEFT JOIN school.listclub ON  schoolchild.id_schoolchild=listclub.id_schoolchild WHERE (listclub.id_club=$id)";
$result1 = mysqli_query($conn_id, $query);
echo "<table border=2px cellpadding=5 cellspacing=5 align=center>";
echo "<tr align=center valign=middle style='color:#000000'><td>id Школьника</td><td>Фамилия</td><td>Имя</td><td>Отчество</td></tr>"; 
while ($row = mysqli_fetch_assoc($result1)) {
	if ($flag==0) {
		$flag=1;
		echo "<tr bgcolor=#ffffff style='color:#000000'>";
	} else {
		$flag=0;
		echo "<tr style='color:#000000'>";
	}
	echo "<td>".$row['id_schoolchild']."</td>";
	echo "<td>".$row['surname']."</td>";
	echo "<td>".$row['first_name']."</td>";
	echo "<td>".$row['second_name']."</td>";
	echo "</tr>";
}
echo "</table>"; 
mysqli_close($conn_id);
echo "<p align='right'>Подпись ________________ Директор Школы</p>";
$today = date("m.d.y");
echo "<p align='right'>".$today."</p>";
?>
</body>
</html>