<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Профиль</title>
</head>
<body>
	<h1>Профиль пользователя</h1>
	<p>Логин пользователя: <?=$_SESSION['name']?></p>    
    <a href="index.html"><p>Начальная страница</p></a>
    <a href="start.php"><p>Назад</p></a>
    <a href="logout.php"><p>Выход</p></a>
</body>
</html>