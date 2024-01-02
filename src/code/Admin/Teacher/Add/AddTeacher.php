<!doctype html>
<html>
<head>
<title>Добавление школьника</title>
<link href="../../../../materials/style/AuthorizationStyle.css" rel="stylesheet" type="text/css">
<link href="../../../../materials/icon/schoolicon.ico" rel="icon" type='mage/x-icon'>
</head>
<body>
<form action="./ProcessAddTeacher.php" method = "post" class = "box">
<b><p>Добавление учителя</p></b>
<img src="../../../../materials/images/add.png" width="50" height="50" >
<b><p>id Учитель</p></b>
<input type="number" name="id_teacher" placeholder="Введите id учителя">
<b><p>Фамилия</p></b>
<textarea name="Surname" placeholder="Введите фамилию"></textarea>
<b><p>Имя </p></b>
<textarea name="First_name" placeholder="Введите имя" ></textarea>
<b><p>Отчество </p></b>
<textarea name="Second_name" placeholder="Введите отчество"></textarea>
<b><p>Классное руководство</p></b>
<input type="number" name="class_guide" placeholder="Есть ли классное руководство">
<b><p>Номер телефона</p></b>
<input type="number" name="number_phone" placeholder="Введите номер телефона">
<b><p>Дата рождения </p></b>
<input type="date" name="data_birth" >
<button type="submit">Добавить</button>
</form>


</body>
</html>