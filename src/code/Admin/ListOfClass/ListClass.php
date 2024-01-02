<html>
<head>
<title>Состав класса</title>
<link href="../../../materials/style/GeneralStyle.css" rel="stylesheet">
<link href="../../../materials/icon/schoolicon.ico" rel="icon" type='mage/x-icon'>
</head>
<p><strong><h1><center>Страница с информацией о составе класса</center></strong></h1></p>
<?php
$conn_id=new mysqli('mysql', 'user', 'password', 'school') or exit ();
$id1 = (int)$_GET['id_class']; 
$id2 = $_GET['id_character'];
echo "<p><strong><h3><center>СПРАВКА</center></strong></h3></p>";
echo "<center>о составе класса </center>";
$result = mysqli_query($conn_id, "SELECT academicyear.name_year FROM academicyear WHERE (academicyear.id_academicyear=1)") or exit ();
if ($row = mysqli_fetch_assoc($result)) {
	echo "<center>".$row['name_year']." учебного года</center>";
}
echo "<center>состав  ".$id1.$id2." класса</center>";
$result_id = mysqli_query($conn_id, "SELECT COUNT(id_schoolchild) FROM schoolchild WHERE ((schoolchild.id_class=$id1) AND (schoolchild.id_character='$id2'))") or exit();
If ($row = mysqli_fetch_row($result_id))
	print('<p><center> Текущее количество учащихся в классе:  ' . $row[0] . '  школьников');
mysqli_free_result ($result_id);
echo "<h1></h1>";
echo "<table border=2px cellpadding=5 cellspacing=5 align=center>";
echo "<tr align=center valign=middle style='color:#000000'><td>id Школьника</td><td>Фамилия</td><td>Имя</td><td>Отчество</td></tr>"; 
$flag=0;
$query="SELECT schoolchild.id_schoolchild, schoolchild.surname, schoolchild.first_name, schoolchild.second_name FROM schoolchild WHERE ((schoolchild.id_class=$id1) AND (schoolchild.id_character='$id2'))";
$result = mysqli_query($conn_id, $query) or exit();
while ($row = mysqli_fetch_assoc($result)) {
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