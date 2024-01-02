<html lang="ru">
<head>
<meta charset="UTF-8">
<title>Заходим...</title>
<link href="./materials/style/AuthorizationStyle.css" rel="stylesheet" type="text/css">
<link href="./materials/icon/schoolicon.ico" rel="icon" type='mage/x-icon'>
</head>
<body>
<form action="Enter.php" method="post" class="box"> 
<h1>Вход в аккаунты Школы</h1>
<img src="./materials/images/img_entrance.png" width="50" height="50" alt=""/>
<h1> </h1>
<?php
echo "<br>";
$login=$_POST['login'];
$password=md5($_POST['psw']);
$query = "SELECT * FROM authorization WHERE user='$login' AND password='$password'";
$conn_id=new mysqli('mysql', 'user', 'password', 'school') or exit ();
$result_id = mysqli_query($conn_id, $query) or exit ();
$row = mysqli_fetch_row($result_id);
If (!isset($row[0])) {
  echo  'Ошибка входа. Попробуйте снова';
  echo "<h3><center><a href='Authorization.php'>Страница входа</a></center></h3>";
} else {
  if (($login=="academicworker")) {
    $_SESSION['user'] = "admin";
    echo '<h3>Успешно! Вы зашли успешно под аккаунтом Заведующего по учебной работе.&nbsp </h3>';
    echo '<h3>Для перехода - нажмите по ссылке:&nbsp </h3> ';
    echo "<br><h3><center><a href='code/Admin/AdminMenu.php'> Заведующий по учебной работе </a></center></h3>";
  } else if ($login=="secretary") {
    $_SESSION['user'] = "secretary";
    echo '<h3>Успешно! Вы зашли успешно под аккаунтом Секретаря.&nbsp</h3><br>';
    echo '<h3>Для перехода - нажмите по ссылке:&nbsp</h3> ';
    echo "<h3><center><a href='code/Secretary/SecretaryMenu.php'> Секретарь</a></center></h3>";
  } 
}
?>
</form>
</body>
</html>
