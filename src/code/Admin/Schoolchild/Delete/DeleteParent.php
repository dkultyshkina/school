<html>
<head>
<title>Удаление ифнормации о родителях</title>
<link href="../../../../materials/icon/schoolicon.ico" rel="icon" type='mage/x-icon'>
<link href="../../../../materials/style/GeneralStyle.css" rel="stylesheet">
</head>
<ul>
<li><a href="../../AdminMenu.php">Главная</a></li>
<li><a href="../Schoolchild.php">Школьники</a></li>
<li><a href="../../Teacher/Teacher.php">Учителя</a></li>
<li><a href="../../ListOfClass/Class.php">Классы</a></li>
<li><a href="../../ListOfClub/Club.php">Кружки</a></li>
<li><a href="../../ListOfSubject/Subject.php">Предметы</a></li>
<li><a href="../../../../Authorization.php">Выход</a></li>
</ul>
<p><strong><h1><center>Удаление информации о родителях</center></strong></h1></p>
<center><img src="../../../../materials/images/delete.png" width="50" height="50" ></center>
<h1></h1>
<?php
$conn_id=new mysqli('mysql', 'user', 'password', 'school');
$id = (int)$_GET['id_schoolchild']; 
$query = "SELECT parent.id_parent, parent.surName, parent.first_Name, parent.last_Name, parent.address, parent.phone_number, relationship.degree_kinship FROM parent LEFT JOIN school.relationship ON parent.id_parent = relationship.id_parent  LEFT JOIN school.schoolchild ON relationship.id_schoolchild = schoolchild.id_schoolchild WHERE schoolchild.id_schoolchild=$id";
$result1 = mysqli_query($conn_id, $query);
echo "<table border=0 cellpadding=5 cellspacing=5 align=center>";
echo "<tr align=center valign=middle bgcolor=#2d5787 style='color:#ffffff'><td>id Родитель</td><td>Фамилия</td><td>Имя</td><td>Отчество</td><td>Адрес</td><td>Степень родства</td><td>Номер телефона</td><td>Удалить</td></tr>"; 
while ($row = mysqli_fetch_assoc($result1)) {
    echo "<tr bgcolor=#f0f0f7 style='color:#182c88'>";
    echo "<td>".$row['id_parent']."</td>";
    echo "<td>".$row['surName']."</td>";
    echo "<td>".$row['first_Name']."</td>";
    echo "<td>".$row['last_Name']."</td>";
    echo "<td>".$row['address']."</td>";
    echo "<td>".$row['phone_number']."</td>";
    echo "<td>".$row['degree_kinship']."</td>";
    echo "<td><a href='./ProcessDeleteParent.php?id_parent=".$row['id_parent']."'>Удаление</a></td>";
    echo "</tr>";
}
echo "</table>"; 
mysqli_close($conn_id);
?>