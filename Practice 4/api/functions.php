<?php

function getWeathers($connect)
{
	$weathers = mysqli_query($connect, "SELECT * FROM weather_day");
	$WeatherList = [];
	while($weather = mysqli_fetch_assoc($weathers)){
		$WeatherList[] = $weather;
	}
	echo json_encode($WeatherList);
}

function getWeather($connect, $id)
{
	$weather = mysqli_query($connect,"SELECT * FROM weather_day WHERE day_id = '$id'");
	if(mysqli_num_rows($weather) === 0){
		http_response_code(404);
		$res = [
			"status" => false,
			"message" => "weather not found"
		];
		echo json_encode($res);
	} else {
		$weather = mysqli_fetch_assoc($weather);
		echo json_encode($weather);
	}
}
function addWeather($connect, $data){
	$weather = $data['day'];
	$temperature =  $data['day_temperature'];
    $night_temperature =  $data['night_temperature'];
    $pressure =  $data['pressure'];
    $humidity =  $data['humidity'];
    $wind =  $data['wind'];
    $wind_direction =  $data['wind_direction'];
    $status =  $data['status'];
	mysqli_query($connect, "INSERT INTO weather_day (day, day_temperature, night_temperature, pressure, humidity, wind, wind_direction, status) 
    VALUES 
    ('$weather','$temperature', '$night_temperature', '$pressure', '$humidity', '$wind', '$wind_direction', '$status')");
	
	http_response_code(201);

	$res = [
		"status" => true,
		"day_id" => mysqli_insert_id($connect)
	];
	echo json_encode($res);
}

function updateWeather($connect, $data){
	$id = $data['id'];
	$date = $data['day'];
	$day_temperature =  $data['day_temperature'];
    $night_temperature =  $data['night_temperature'];
    $pressure =  $data['pressure'];
    $humidity =  $data['humidity'];
    $wind =  $data['wind'];
    $wind_direction =  $data['wind_direction'];
    $status =  $data['status'];
	mysqli_query($connect, "UPDATE weather_day SET day = '$date', day_temperature = '$day_temperature', night_temperature = '$night_temperature', 'pressure' = '$pressure', 'humidity' = '$humidity', 'wind' = '$wind', 'wind_direction' = '$wind_direction', 'status' = '$status' WHERE weather_day.day_id = $id");
	
	http_response_code(200);
	$res = [
		"status" => true,
		"message" => "weather is edited",
		"day" => $date,
		"day_temperature" => $day_temperature,
        "night_temperature" => $night_temperature,
        "pressure" => $pressure,
        "humidity" => $humidity,
        "wind" => $wind,
        "wind_direction" => $wind_direction,
        "status" => $status
	];
	echo json_encode($res);
}

function deleteWeather($connect, $id){
	mysqli_query($connect, "DELETE FROM weather_day WHERE weather_day.day_id = $id");

	http_response_code(200);
	$res = [
		"status" => true,
		"day_id" => $id,
		"message" => "weather is deleted",
	];
	echo json_encode($res);
}