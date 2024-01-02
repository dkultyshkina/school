<?php 
$mysql = new mysqli('mysql', 'user', 'password', 'school');
if (!$mysql){
	die("Error connect to data base");
}
$id = (int)$_GET['id_academicrecord'];
$query1="SELECT subject.name_subject, mark.name_mark, academicrecord.mark FROM academicrecord LEFT JOIN school.mark ON academicrecord.id_mark = mark.id_mark LEFT JOIN school.subject ON academicrecord.id_subject = subject.id_subject WHERE academicrecord.id_academicrecord =$id";
$result1=$mysql->query($query1);
$query2="SELECT * FROM subject";
$result2=$mysql->query($query2);
$query3="SELECT * FROM mark";
$result3=$mysql->query($query3);
?>
<html>
<head>
<title>Добавление успеваемости</title>
<link href="../../../../materials/style/AuthorizationStyle.css" rel="stylesheet" type="text/css">
<link href="../../../../materials/icon/schoolicon.ico" rel="icon" type='mage/x-icon'>
</head>
<body>
<form action="./ProcessModificationRecord.php" method = "post" class = "box">
<b><p>Изменение данных</p></b>
<img src="../../../../materials/images/change.png" width="50" height="50" >
<input type="hidden" name ="id_academicrecord" value="<?=$_GET['id_academicrecord']?>">
<input type="hidden" name ="id_schoolchild" value="<?=$_GET['id_schoolchild']?>">
<b><p>Предмет</p></b>
<select name="name_subject">
<option>Предмет</option>
<?php while ($row=$result2->fetch_array(MYSQLI_ASSOC)){ ?>
<option value=<?php echo $row['id_subject']?>>"<?php echo $row['name_subject']?>"</option>
<?php }?>
</select>
<b><p>Тип оценки</p></b>
<select name="name_mark">
<option>Тип оценки</option>
<?php while ($row=$result3->fetch_array(MYSQLI_ASSOC)){ ?>
<option value=<?php echo $row['id_mark']?>>"<?php echo $row['name_mark']?>"</option>
<?php }?>
</select>
<b><p>Оценки</p></b>
<input type="number" name="mark" placeholder="Введите оценку" value="<?=$_GET['mark']?>">
<button type="submit">Добавить</button>
</form>
</body>
</html>