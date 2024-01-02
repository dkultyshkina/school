<html>
<head>
<title>Поиск</title>
<link href="../../../materials/style/GeneralStyle.css" rel="stylesheet">
<link href="../../../materials/icon/schoolicon.ico" rel="icon" type='mage/x-icon'>
</head>
<ul>
<li><a href="../SecretaryMenu.php">Главная</a></li>
<li><a href="../Schoolchild/Schoolchild.php">Школьники</a></li>
<li><a href="../Teacher/Teacher.php">Учителя</a></li>
<li><a href="./Class.php">Классы</a></li>
<li><a href="../ListOfClub/Club.php">Кружки</a></li>
<li><a href="../ListOfSubject/Subject.php">Предметы</a></li>
<li><a href="../../../Authorization.php">Выход</a></li>
</ul>
<h1></h1>
<p><strong><h1><center>Страница с поиском </center></strong></h1></p>
<center><img src="../../../materials/images/search.png" width="100" height="100" ></center><br>
<form action="<?= $_SERVER['SCRIPT_NAME'] ?>" class="box"><center><p>Поиск класса: <input type="text" name="search" id=""> <input type="submit" value="Поиск"></p><hr></form>
<?php
$inputSearch = $_REQUEST['search']; 
$mysqli = new mysqli('mysql', 'user', 'password', 'school'); 
if ($mysqli->connect_error) {
    printf("Соединение не удалось: %s\n", $mysqli->connect_error);
    exit();
}
$rest = mb_substr($inputSearch, -1,1, 'UTF-8');
$rest2 = mb_substr($inputSearch, 0,2, 'UTF-8');
$sql = "SELECT class.id_class, class.id_character, teacher.surname, teacher.first_name, teacher.second_name FROM class LEFT JOIN school.teacher ON class.id_teacher = teacher.id_teacher WHERE (class.`id_class` = '$rest2' AND class.`id_character` = '$rest' AND class.id_academicyear=1)";
$result = $mysqli -> query($sql);
if ($result -> num_rows > 0) {
	echo "<table border=0 cellpadding=5 cellspacing=5 align=center>";
    echo "<tr align=center valign=middle bgcolor=#2d5787 style='color:#ffffff'><td>Класс</td><td>Буква</td><td>Фамилия</td><td>Имя</td><td>Отчество</td><td>Состав класса</td></tr>"; 
	$flag=0;
    while ($row = $result -> fetch_assoc()) {
		if ($flag==0) {
            $flag=1;
            echo "<tr bgcolor=#f0f0f7 style='color:#182c88'>";
        } else {
            $flag=0;
            echo "<tr style='color:#182c88'>";
        }
        echo "<td>".$row['id_class']."</td>";	
		echo "<td>".$row['id_character']."</td>";
		echo "<td>".$row['surname']."</td>";
        echo "<td>".$row['first_name']."</td>";
        echo "<td>".$row['second_name']."</td>";
		echo "<td><a href='listclass.php?id_class=".$row['id_class']."&id_character=".$row['id_character']."'>Информация о составе класса</a></td>";
		echo "</tr>";
    }
} else {
    echo "Не найдено";
}
?>
</body>
</html>