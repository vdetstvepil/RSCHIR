<?php
    session_start();
    $ver = mysqli_connect("db", "user", "password", "appDB");
    if ( mysqli_connect_error() ){
	        exit('Failed to connect to MySQL: ' . mysqli_connect_error());
        }
    $result=$ver->query("SELECT * FROM login"); 

    if(isset($_POST["login-btn"])) {
	    // Проверка на пустоту
        if (empty($_POST['login']) || empty($_POST['paswd'])) {
            echo '<script>alert("Неверные данные!")</script>';
        } else {
            if ($info = $ver->prepare('SELECT person_name, pasword FROM login WHERE person_name = ?')) {
                // s = string
                $info->bind_param('s', $_POST['login']);
                $info->execute();
                $info->store_result();
                if ($info->num_rows > 0) {
                    $info->bind_result($id, $password);
                    $info->fetch();
                    // Аккаунт существует
                    if ($_POST['paswd'] === $password) {
                        // Авторизация пройдена
                        session_regenerate_id();
                        $_SESSION['loggedin'] = TRUE;
                        $_SESSION['name'] = $_POST['login'];
                        $_SESSION['id'] = $id;
                        header('Location: start.php');
                    } else {
                        echo '<script>alert("Неверный пароль")</script>';
                    }
                    } else {
                        echo '<script>alert("Неверный логин")</script>';
                    }
                $info->close();
            }
        }                     
    }
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Авторизация</title>
</head>
<body>
    <form method = "post">
        <input type="text" name="login" placeholder="Логин"/>	
        <input type="password" name="paswd" placeholder="Пароль"/>
        <input type="submit" value="Войти" class="btn-login" name ="login-btn"/>
    </form>
</body>
</html>