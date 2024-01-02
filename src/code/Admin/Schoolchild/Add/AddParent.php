<html>
<head>
<title>Добавление родителя</title>
<link href="../../../../materials/style/AuthorizationStyle.css" rel="stylesheet" type="text/css">
<link href="../../../../materials/icon/schoolicon.ico" rel="icon" type='mage/x-icon'>
</head>

<body>
<form action="./ProcessAddParent.php" method = "post" class = "box">

<b><p>Добавление родителя</p></b>
<img src="../../../../materials/images/add.png" width="50" height="50" >
<input type="hidden" name ="id_schoolchild" value="<?=$_GET['id_schoolchild']?>">
<b><p>id родитель</p></b>
<input type="number" name="id_parent" placeholder="Введите id родителя">
<b><p>Фамилия</p></b>
<textarea name="surName" placeholder="Введите фамилию"></textarea>
<b><p>Имя </p></b>
<textarea name="first_Name" placeholder="Введите имя" ></textarea>
<b><p>Отчество </p></b>
<textarea name="last_Name" placeholder="Введите отчество"></textarea>
<b><p>Адрес</p></b>
<textarea name="address" placeholder="Введите адрес"></textarea>
<b><p>Степень родства</p></b>
<textarea name="degree_kinship" placeholder="Введите степень родства"></textarea>
<b><p>Номер телефона</p></b>
<input type="number" name="phone_number" placeholder="Введите номер телефона">
<button type="submit">Добавить</button>
</form>
</body>
</html>