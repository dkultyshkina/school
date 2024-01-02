<!doctype html>
<html>
<head>
<title>Добавление</title>
<link href="../../../../materials/style/AuthorizationStyle.css" rel="stylesheet" type="text/css">
<link href="../../../../materials/icon/schoolicon.ico" rel="icon" type='mage/x-icon'>
</head>
<body>
<form action="./ProcessAddEmploymentClass.php" method = "post" class = "box">
<b><p>Добавление</p></b>
<img src="../../../../materials/images/add.png" width="50" height="50" >
<input type="hidden" name ="id_teacher" value="<?=$_GET['id_teacher']?>">
<b><p>Класс</p></b>
<input type="number" name="id_class" placeholder="Введите класс">
<b><p>Буква класса</p></b>
<textarea name="id_character" placeholder="Введите букву класса"></textarea>
<button type="submit">Добавить</button>
</form>
</body>
</html>