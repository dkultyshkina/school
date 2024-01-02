<html>
<head>
<title>Поиск</title>
<link href="../../../materials/style/GeneralStyle.css" rel="stylesheet">
<link href="../../../materials/icon/schoolicon.ico" rel="icon" type='mage/x-icon'>
</head>
<ul>
<li><a href="../SecretaryMenu.php">Главная</a></li>
<li><a href="./Schoolchild.php">Школьники</a></li>
<li><a href="../Teacher/Teacher.php">Учителя</a></li>
<li><a href="../ListOfClass/Class.php">Классы</a></li>
<li><a href="../ListOfClub/Club.php">Кружки</a></li>
<li><a href="../ListOfSubject/Subject.php">Предметы</a></li>
<li><a href="../../../Authorization.php">Выход</a></li>
</ul>
<p><strong><h1><center>Страница с поиском </center></strong></h1></p>
<center><img src="../../../materials/images/search.png" width="100" height="100" ></center>
<br><form action="<?= $_SERVER['SCRIPT_NAME'] ?>" class="box"><center><p>Поиск школьника: <input type="text" name="search" id=""> <input type="submit" value="Поиск"></p><hr></form>
<?php
$inputSearch = $_REQUEST['search']; 
$mysqli = new mysqli('mysql', 'user', 'password', 'school'); 
if ($mysqli->connect_error) {
    printf("Соединение не удалось: %s\n", $mysqli->connect_error);
    exit();
}
$sql = "SELECT * FROM `schoolchild` WHERE `surname` = '$inputSearch' || `id_schoolchild` = '$inputSearch'";
$result = $mysqli -> query($sql);
if ($result -> num_rows > 0) {
    echo "<table border=0 cellpadding=5 cellspacing=5 align=center>";
    echo "<tr align=center valign=middle bgcolor=#2d5787 style='color:#ffffff'><td>id Школьника</td><td>Фамилия</td><td>Имя</td><td>Отчество</td><td>Адрес</td><td>Дата рождения</td><td> Класс </td><td>Буква класса</td><td>Родитель</td><td>Успеваемость</td></tr>"; 
    $flag=0;
    while ($row = $result -> fetch_assoc()) {
        if ($flag==0) {
            $flag=1;
            echo "<tr bgcolor=#f0f0f7 style='color:#182c88'>";
        } else {
            $flag=0;
            echo "<tr style='color:#182c88'>";
        }
        echo "<td>".$row['id_schoolchild']."</td>";
        echo "<td>".$row['surname']."</td>";
        echo "<td>".$row['first_name']."</td>";
        echo "<td>".$row['second_name']."</td>";
        echo "<td>".$row['address']."</td>";
        echo "<td>".$row['date_birth']."</td>";
        echo "<td>".$row['id_class']."</td>";
        echo "<td>".$row['id_character']."</td>";
        echo "<td><a href='parent.php?id_schoolchild=".$row['id_schoolchild']."'>Информация о родителе</a></td>";	
        echo "<td><a href='record.php?id_schoolchild=".$row['id_schoolchild']."'>Успеваемость</a></td>";
        echo "</tr>";
    }
} else {
    echo "Никто не найден";
}
?>
</body>
</html>