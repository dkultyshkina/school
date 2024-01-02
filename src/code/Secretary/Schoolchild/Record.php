<html>
<head>
<title>Успеваемость</title>
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
<p><strong><h1><center>Страница с информацией об успеваемости</center></strong></h1></p>
<center><img src="../../../materials/images/record.png" width="100" height="100" ></center>
<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conn_id=new mysqli('mysql', 'user', 'password', 'school')  or exit ();
$id = (int)$_GET['id_schoolchild']; 
$query="SELECT schoolchild.id_class FROM schoolchild WHERE schoolchild.id_schoolchild=$id";
$result = mysqli_query($conn_id, $query) or exit ();
if (!$result) {
    die('Ошибка выполнения запроса:' . mysql_error());
}
$class = mysqli_fetch_assoc($result)['id_class'];
echo "<h2> </h2>";
if ($class == "11") {
	echo "<h3><center><a href='./Record/AllRecord.php?id_schoolchild=".$id."'>Общая успеваемость</a></center></h3>";
	echo "<h3><center><a href='./Record/FirstHalfOnTheYearRecord.php?id_schoolchild=".$id."'>Справка успеваемости по 1 полугодию</a></center></h3>";
	echo "<h3><center><a href='./Record/SecondHalfOnTheYearRecord.php?id_schoolchild=".$id."'>Справка успеваемости по 2 полугодию</a></center></h3> ";
	echo "<h3><center><a href='./Record/YearRecordHalfOfYear.php?id_schoolchild=".$id."'>Справка успеваемости Годовые оценки</a></center></h3> ";
	echo "<h3><center><a href='./Record/ExamRecord.php?id_schoolchild=".$id."'>Справка успеваемости Экзаменационные оценки</a></center></h3> ";
	echo "<h3><center><a href='./Record/ResultRecord.php?id_schoolchild=".$id."'>Справка успеваемости Итоговые оценки</a></center></h3>";
} else if ($class == "10") {
	echo "<h3><center><a href='./Record/AllRecord.php?id_schoolchild=".$id."'>Общая успеваемость</a></center></h3></li> ";
	echo "<h3><center><a href='./Record/FirstHalfOnTheYearRecord.php?id_schoolchild=".$id."'>Справка успеваемости по 1 полугодию</a></center></h3>";
	echo "<h3><center><a href='./Record/SecondHalfOnTheYearRecord.php?id_schoolchild=".$id."'>Справка успеваемости по 2 полугодию</a></center></h3>";
	echo "<h3><center><a href='./Record/YearRecordHalfOfYear.php?id_schoolchild=".$id."'>Справка успеваемости Годовые оценки</a></center></h3>";
} else if ($class == "9") {
	echo "<h3><center><a href='./Record/AllRecord.php?id_schoolchild=".$id."'>Общая успеваемость</a></center></h3>";
	echo "<h3><center><a href='./Record/FirstQuaterRecord.php?id_schoolchild=".$id."'>Справка успеваемости по 1 четверти</a></center></h3>";
	echo "<h3><center><a href='./Record/SecondQuaterRecord.php?id_schoolchild=".$id."'>Справка успеваемости по 2 четверти</a></center></h3>";
	echo "<h3><center><a href='./Record/ThirdQuaterRecord.php?id_schoolchild=".$id."'>Справка успеваемости по 3 четверти</a></center></h3>";
	echo "<h3><center><a href='./Record/FourthQuaterRecord.php?id_schoolchild=".$id."'>Справка успеваемости по 4 четверти</a></center></h3>";
	echo "<h3><center><a href='./Record/YearRecordQuater.php?id_schoolchild=".$id."'>Справка успеваемости Годовые оценки</a></center></h3>";
	echo "<h3><center><a href='./Record/ExamRecord.php?id_schoolchild=".$id."'>Справка успеваемости Экзаменационные оценки</a></center></h3>";
	echo "<h3><center><a href='./Record/ResultRecord.php?id_schoolchild=".$id."'>Справка успеваемости Итоговые оценки</a></center></h3>";
} else {
	echo "<h3><center><a href='./Record/AllRecord.php?id_schoolchild=".$id."'>Общая успеваемость</a></center></h3> ";
	echo "<h3><center><a href='./Record/FirstQuaterRecord.php?id_schoolchild=".$id."'>Справка успеваемости по 1 четверти</a></center></h3>";
	echo "<h3><center><a href='./Record/SecondQuaterRecord.php?id_schoolchild=".$id."'>Справка успеваемости по 2 четверти</a></center></h3>";
	echo "<h3><center><a href='./Record/ThirdQuaterRecord.php?id_schoolchild=".$id."'>Справка успеваемости по 3 четверти</a></center></h3>";
	echo "<h3><center><a href='./Record/FourthQuaterRecord.php?id_schoolchild=".$id."'>Справка успеваемости по 4 четверти</a></center></h3>";
	echo "<h3><center><a href='./Record/YearRecordQuater.php?id_schoolchild=".$id."'>Справка успеваемости Годовые оценки</a></center></h3>";
}
mysqli_close($conn_id);
?>
</body>
</html>