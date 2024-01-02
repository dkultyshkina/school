<html>
<head>
<meta charset="utf-8">
<title>Администратор</title>
<link href="../../materials/style/Secretary.css" rel="stylesheet">
<link href="../../materials/icon/schoolicon.ico" rel="icon" type='mage/x-icon'>
<form action="AdminMenu.php" method="post" class="box"> 
</head>
<h1>Добро пожаловать!</h1>
<img src="../../materials/images/school.png" width="120" height="120" alt=""/>
<h1> </h1>
<h2> <label for="choice"><b>Для ознакомления со списками, выберите:</b></label></h2>
<h1> </h1>
	<div class="card">
    <img src="../../materials/images/schoolchild1.png" width="80" height="80" alt="" hspace="30"/>
    <a href="./Schoolchild/Schoolchild.php">Список всех школьников</a> 
</div>
	<div class="card">
    <img src="../../materials/images/teacher.png" width="80" height="80" alt="" hspace="10"/>	
    <a href="./Teacher/Teacher.php">Список всех учителей </a>
</div>
	<div class="card">
    <img src="../../materials/images/class.png" width="100" height="75" alt="" hspace="10"/>	
	<a href="./ListOfClass/Class.php">Список классов</a>
</div>
	<div class="card">
    <img src="../../materials/images/club1.png" width="75" height="75" alt="" hspace="10"/>
    <a href="./ListOfClub/Club.php">Списки кружков</a>
</div>
	<div class="card">
    <img src="../../materials/images/subject.png" width="80" height="80" alt="" hspace="10"/>
    <a href="./ListOfSubject/Subject.php">Список предметов</a>
</div>
<h1> </h1>
<h2><a href="../../Authorization.php">Выход</a></h2>
</form>
<body>
</body>
</html>