<html>
<head>
<title>Поиск</title>
<link href="../../../materials/style/GeneralStyle.css" rel="stylesheet">
<link href="../../../materials/icon/schoolicon.ico" rel="icon" type='mage/x-icon'>
</head>
<ul>
<li><a href="../AdminMenu.php">Главная</a></li>
<li><a href="../Schoolchild/Schoolchild.php">Школьники</a></li>
<li><a href="./Teacher.php">Учителя</a></li>
<li><a href="../ListOfClass/Class.php">Классы</a></li>
<li><a href="../ListOfClub/Club.php">Кружки</a></li>
<li><a href="../ListOfSubject/Subject.php">Предметы</a></li>
<li><a href="../../../Authorization.php">Выход</a></li>
</ul>
<p><strong><h1><center>Страница с поиском </center></strong></h1></p>
<center><img src="../../../materials/images/search.png" width="100" height="100" ></center><br>
<form action="<?= $_SERVER['SCRIPT_NAME'] ?>" class="box"><center><p>Поиск учителя: <input type="text" name="search" id=""> <input type="submit" value="Поиск"></p><hr></form>
<?php
$inputSearch = $_REQUEST['search'];
$mysqli = new mysqli('mysql', 'user', 'password', 'school') or exit ();
if ($mysqli->connect_error) {
    printf("Соединение не удалось: %s\n", $mysqli->connect_error);
    exit();
}
$sql = "SELECT * FROM `teacher` WHERE `Surname` = '$inputSearch' || `id_teacher` = '$inputSearch'";
$result = $mysqli -> query($sql);
if ($result -> num_rows > 0) {
	echo "<table border=0 cellpadding=5 cellspacing=5 align=center>";
	echo "<tr align=center valign=middle bgcolor=#2d5787 style='color:#ffffff'><td>id учитель</td><td>Фамилия</td><td>Имя</td><td>Отчество</td><td>Классное руководство</td><td>Телефон</td><td>Дата рождения</td><td>Занятость</td></tr>"; 
	$flag=0;
	while ($row = $result -> fetch_assoc()) {
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
		echo "<td><a href='busy.php?id_teacher=".$row['id_teacher']."'>Информация о занятости</a></td>";
		echo "</tr>";
	}
} else {
	echo "Никто не найден";
}
?>
</body>
</html>