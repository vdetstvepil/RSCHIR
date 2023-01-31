<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *, Authorization');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Credentials: true');

header('Content-type: json/application');

require 'functions.php';

$method = $_SERVER['REQUEST_METHOD'];

$q = $_GET['q'];
$params = explode('/', $q);

$type = $params[0];
$id = $params[1];

$connect = mysqli_connect("db", "user", "password", "appDB");

switch ($method) {
    case 'GET':
        if($type === 'weather_day'){
            if(isset($id)){
                getWeather($connect, $id);
               
            } else{
                getWeathers($connect);
            }
        }
        break;
    case 'POST':
        if(isset($_POST['day_id'])){
            updateWeather($connect, $_POST);
        }
        else {
            addWeather($connect, $_POST);
        }
        break;
    case 'DELETE':
        if($type === 'weather_day'){
            if(isset($id))
            {
                deleteWeather($connect,$id);      
            }  
        }  
        break;    
}