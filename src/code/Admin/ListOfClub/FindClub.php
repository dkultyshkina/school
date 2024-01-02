
<html>
<head>
<title>Поиск</title>
<link href="../../../materials/style/GeneralStyle.css" rel="stylesheet">
<link href="../../../materials/icon/schoolicon.ico" rel="icon" type='mage/x-icon'>
</head>
<ul>
<li><a href="../AdminMenu.php">Главная</a></li>
<li><a href="../Schoolchild/Schoolchild.php">Школьники</a></li>
<li><a href="../Teacher/Teacher.php">Учителя</a></li>
<li><a href="../ListOfClass/Class.php">Классы</a></li>
<li><a href="./Club.php">Кружки</a></li>
<li><a href="../ListOfSubject/Subject.php">Предметы</a></li>
<li><a href="../../../Authorization.php">Выход</a></li>
</ul>
<h1></h1>
<p><strong><h1><center>Страница с поиском </center></strong></h1></p>
<center><img src="../../../materials/images/search.png" width="100" height="100" ></center><br>
<form action="<?= $_SERVER['SCRIPT_NAME'] ?>" class="box"><center><p>Поиск кружка: <input type="text" name="search" id=""> <input type="submit" value="Поиск"></p><hr></form>
<?php
$inputSearch = $_REQUEST['search']; 
$mysqli = new mysqli('mysql', 'user', 'password', 'school'); 
if ($mysqli->connect_error) {
    printf("Соединение не удалось: %s\n", $mysqli->connect_error);
    exit();
}
$sql = "SELECT club.id_club, club.name_club, teacher.surname, teacher.first_name, teacher.second_name, club.price FROM club LEFT JOIN school.teacher ON club.id_teacher = teacher.id_teacher WHERE `name_club` = '$inputSearch' || `id_club` = '$inputSearch'";
$sql1= "SELECT club.name_club, timetable.Day_Week, timetable.Time FROM club LEFT JOIN timetable ON club.id_club = timetable.id_club WHERE club.`name_club` = '$inputSearch' || club.`id_club` = '$inputSearch'";
$result = $mysqli->query($sql);
$result1=$mysqli->query($sql1);
if ($result->num_rows > 0) {
	echo "<table border=0 cellpadding=5 cellspacing=5 align=center>";
        echo "<tr align=center valign=middle bgcolor=#2d5787 style='color:#ffffff'><td>id кружок</td><td>Название</td><td>Преподаватель: Фамилия</td><td>Имя</td><td>Отчество</td><td>Цена</td><td>Список</td></tr>"; 
	$flag=0;
        while ($row = $result -> fetch_assoc()) {
 	    if ($flag==0) {
                $flag=1; 
                echo "<tr bgcolor=#f0f0f7 style='color:#182c88'>";
            } else {
                $flag=0;
                echo "<tr style='color:#182c88'>";
            }
            echo "<td>".$row['id_club']."</td>";	
	    echo "<td>".$row['name_club']."</td>";
	    echo "<td>".$row['surname']."</td>";
            echo "<td>".$row['first_name']."</td>";
            echo "<td>".$row['second_name']."</td>";
	    echo "<td>".$row['price']."</td>";
	    echo "<td><a href='listclub.php?id_club=".$row['id_club']."'>Список участников</a></td>";
	    echo "</tr>";
        }
        $flag=0;
        echo "<table border=0 cellpadding=5 cellspacing=5 align=center>";
        echo "<tr align=center valign=middle bgcolor=#2d5787 style='color:#ffffff'><td>Название</td><td>День недели</td><td>Время</td></tr>"; 
        while ($row = $result1 -> fetch_assoc()) {
	    if ($flag==0) {
                $flag=1;
                echo "<tr bgcolor=#f0f0f7 style='color:#182c88'>";
            } else {
                $flag=0;
                echo "<tr style='color:#182c88'>";
            }
            echo "<td>".$row['name_club']."</td>";
	    echo "<td>".$row['Day_Week']."</td>";
            echo "<td>".$row['Time']."</td>";
	    echo "</tr>";
        }
} else {
        echo "Не найдено";
}
?>
</body>
</html>