<html>
<head>
<title>Родители</title>
<link href="../../../materials/style/GeneralStyle.css" rel="stylesheet">
<link href="../../../materials/icon/schoolicon.ico" rel="icon" type='mage/x-icon'>
</head>
<ul>
<li><a href="../AdminMenu.php">Главная</a></li>
<li><a href="./Schoolchild.php">Школьники</a></li>
<li><a href="../Teacher/Teacher.php">Учителя</a></li>
<li><a href="../ListOfClass/Class.php">Классы</a></li>
<li><a href="../ListOfClub/Club.php">Кружки</a></li>
<li><a href="../ListOfSubject/Subject.php">Предметы</a></li>
<li><a href="../../../Authorization.php">Выход</a></li>
</ul>
<?php $id = (int)$_GET['id_schoolchild']; ?>
<p><strong><h3><center>Страница с информацией о родителях школьника</center></strong></h3></p>
<center>
<img src="../../../materials/images/parent.png" width="100" height="100" >
</center>
<?php echo "<p><h4><center><img src='../../../materials/images/add.png' width='20' height='20'><a href='./Add/AddParent.php?id_schoolchild=".$id."'>Добавление</a>&nbsp ";?> <img src="../../../materials/images/change.png" width="20" height="20">
<?php echo "<a href='./Modification/ParentForChange.php?id_schoolchild=".$id."'>Обновление</a>&nbsp ";?> <img src='../../../materials/images/delete.png' width='20' height='20' ><?php echo  "<a href='./Delete/DeleteParent.php?id_schoolchild=".$id."'>Удаление</a>&nbsp ";?>
<h1> </h1>
<?php
$flag=0;
$conn_id=new mysqli('mysql', 'user', 'password', 'school') or exit ();
$id = (int)$_GET['id_schoolchild']; 
$query = "SELECT parent.id_parent, parent.surName, parent.first_Name, parent.last_Name, parent.address, parent.phone_number, relationship.degree_kinship FROM parent LEFT JOIN school.relationship ON parent.id_parent = relationship.id_parent  LEFT JOIN school.schoolchild ON relationship.id_schoolchild = schoolchild.id_schoolchild WHERE schoolchild.id_schoolchild=$id";
$result1 = mysqli_query($conn_id, $query);
echo "<table border=0 cellpadding=5 cellspacing=5 align=center>";
echo "<tr align=center valign=middle bgcolor=#2d5787 style='color:#ffffff'><td>id Родитель</td><td>Фамилия</td><td>Имя</td><td>Отчество</td><td>Адрес</td><td>Номер телефона</td><td>Степень родства</td></tr>"; 
while ($row = mysqli_fetch_assoc($result1)) {
	if ($flag==0) {
		$flag=1; 
		echo "<tr bgcolor=#f0f0f7 style='color:#182c88'>";
	} else {
		$flag=0; 
		echo "<tr style='color:#182c88'>";
	}
	echo "<td>".$row['id_parent']."</td>";
	echo "<td>".$row['surName']."</td>";
	echo "<td>".$row['first_Name']."</td>";
	echo "<td>".$row['last_Name']."</td>";
	echo "<td>".$row['address']."</td>";
	echo "<td>".$row['phone_number']."</td>";
	echo "<td>".$row['degree_kinship']."</td>";
	echo "</tr>";
}
echo "</table>"; 
mysqli_close($conn_id);
?>
</body>
</html>