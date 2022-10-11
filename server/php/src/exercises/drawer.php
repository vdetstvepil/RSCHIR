<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drawing page</title>
</head>
<body>
<?php
if(isset($_GET['num']))
{
    // Если введенная строка - это не число,
    // то выводим сообщение об ошибке
    if (!is_numeric($_GET['num'])){
        // Выводим сообщение на экран
        print('Incorrect argument');

        // Прерываем выполнение функции
        exit(0);
    }

    // Получаем параметр
    $param = (int) $_GET['num'];

    // Объявляем переменные color, shape
    $color = '';
    $shape = '';

    // Определяем цвет фигуры
    if ($param % 3 == 0)
        $color = 'red';
    elseif ($param % 3 == 1)
        $color = 'yellow';
    elseif ($param % 3 == 2)
        $color = 'green';

    // Определяем форму фигуры
    if ($param % 3 == 0)
        $shape = 'circle';
    elseif ($param % 3 == 1)
        $shape = 'square';
    elseif ($param % 3 == 2)
        $shape = 'rectangle';

    // Выставляем координаты фигуре
    $x = 50 + 100 * ($param % 3);
    $y = 50 + 100 * ($param % 3);
    if ($shape == 'circle' || $shape == 'square')
        $x > $y ? $x = $y : $y = $x;

    // Картинка для отображения
    $svg_code = '<svg width = "' . $x . '" height= "' . $y . '">';

    // В зависимости от фигуры, рисуем с разными параметрами
    switch($shape){
        case 'circle':
            $svg_code .= '<circle cx="' .
                $x / 2 . '" cy ="' .
                $y / 2 . '" r="' .
                $x / 2 . '" fill = "' .
                $color . '" />';
            break;
        case 'square':
        case 'rectangle':
            $svg_code .=
                '<rect x="0" y="0" width="' .
                $x . '" height="' .
                $y . '" fill="' .
                $color . '" />';
            break;
    }
    // Выводим элемент в исходный код страницы
    print($svg_code . '</svg>');
}
?>
</body>
</html>