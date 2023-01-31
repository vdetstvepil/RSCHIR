<?php
session_start();

?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Меню</title>
</head>
<body>
	<h1>Погодка в Москве</h1>
    <?php
		$con = mysqli_connect("db", "user", "password", "appDB");
		$result=$con->query("SELECT * FROM weather_day"); 
		while ($row = mysqli_fetch_assoc($result)) 
		   	{
				echo "<h2>" ."<b>".$row['day']."</b>"."</h2>";
				echo "<h3>" ."<p>".$row['status']."</p>"."</h3>";
				echo "<p>"."<b>". "Температура: "."</b>".$row['day_temperature'] . "°C ".$row['night_temperature'] . "°C" . "</p>";
				echo "<p>" ."<b>". "Давление: "."</b>".$row['pressure'] . " мм рт. ст."."</p>";
				echo "<p>" ."<b>". "Влажность: "."</b>".$row['humidity'] . " %"."</p>";
				echo "<p>" ."<b>". "Ветер: "."</b>".$row['wind'] . " м/с"."</p>";
				echo "<p>" ."<b>". "Направление ветра: "."</b>".$row['wind_direction']."</p>";
				
		   	}
		?>
	<a href="index.html"><p>Начальная страница</p></a>
    <a href="profile.php"><p>Профиль</p></a>
    <a href="logout.php"><p>Выход</p></a>
</body>
</html>