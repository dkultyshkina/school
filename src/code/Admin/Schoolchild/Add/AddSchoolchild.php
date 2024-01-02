<html>
<head>
<title>Добавление школьника</title>
<link href="../../../../materials/style/AuthorizationStyle.css" rel="stylesheet" type="text/css">
<link href="../../../../materials/icon/schoolicon.ico" rel="icon" type='mage/x-icon'>
</head>

<body>
<form action="./ProcessAddSchoolchild.php" method = "post" class = "box">

<b><p>Добавление школьника</p></b>
<img src="../../../../materials/images/add.png" width="50" height="50" >
<b><p>id Школьника</p></b>
<input type="number" name="id_schoolchild" placeholder="Введите id школьника">
<b><p>Фамилия</p></b>
<textarea name="surname" placeholder="Введите фамилию"></textarea>
<b><p>Имя </p></b>
<textarea name="first_name" placeholder="Введите имя" ></textarea>
<b><p>Отчество </p></b>
<textarea name="second_name" placeholder="Введите отчество"></textarea>
<b><p>Адрес</p></b>
<textarea name="address" placeholder="Введите адрес"></textarea>
<b><p>Дата рождения </p></b>
<input type="date" name="date_birth" >
<b><p>Класс</p></b>
<input type="number" name="id_class" placeholder="Введите класс">
<b><p>Буква класса</p></b>
<textarea name="id_character" placeholder="Введите букву класса"></textarea>
<button type="submit">Добавить</button>
</form>
</body>
</html>