<html>
<head>
<title>Успеваемость 1-ого полугодия</title>
<link href="../../../../materials/icon/schoolicon.ico" rel="icon" type='mage/x-icon'>
</head>
<body bgcolor='white'>
<p><strong><h1><center>Страница с успеваемостью 1-ого полугодия</center></strong></h1></p>
<?php
$conn_id=new mysqli('mysql', 'user', 'password', 'school');
$flag=0;
$id = $_GET['id_schoolchild']; 
echo "<p><strong><h3><center>СПРАВКА</center></strong></h3></p>";
echo "<center>об успеваемости</center>";
echo "<center>по итогам 1 полугодия</center>";
$result = mysqli_query($conn_id, "SELECT academicyear.name_year, schoolchild.id_class, schoolchild.id_character,schoolchild.surname,schoolchild.first_name,schoolchild.second_name FROM schoolchild  LEFT JOIN academicrecord ON schoolchild.id_schoolchild = academicrecord.id_schoolchild LEFT JOIN academicyear ON academicrecord.id_academicyear = academicyear.id_academicyear WHERE ((academicrecord.id_schoolchild =$id) AND (academicrecord.id_academicyear=1))") or exit ();
if ($row = mysqli_fetch_assoc($result)) {
	echo "<center>".$row['name_year']." учебного года</center>";
	echo "<center>учащегося ".$row['id_class'].$row['id_character']." класса</center>";
	echo "<center>".$row['surname']." ".$row['first_name']." ".$row['second_name']."</center>";
}
echo "<h1> </h1>";
echo "<table border=2px cellpadding=5 cellspacing=5 align=center>";
echo "<tr align=center valign=middle style='color:#000000'><td>Предмет</td><td>Оценка</td></tr>"; 
$result = mysqli_query($conn_id, "SELECT subject.name_subject, academicrecord.mark FROM academicrecord  LEFT JOIN school.mark ON academicrecord.id_mark = mark.id_mark LEFT JOIN school.subject ON academicrecord.id_subject = subject.id_subject WHERE ((academicrecord.id_schoolchild =$id) AND (academicrecord.id_mark=5))") or exit ();
while ($row = mysqli_fetch_assoc($result)) {
	if ($flag==0) {
		$flag=1; 
		echo "<tr bgcolor=#ffffff style='color:#000000'>";
	} else {
		$flag=0; 
		echo "<tr style='color:#000000'>";
	}
    echo "<td>".$row['name_subject']."</td>";
	echo "<td>".$row['mark']."</td>";
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