<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sorting array</title>
</head>
<body>
<?php
// Проверяем пустоту параметра
if (!empty(isset($_GET['array']))) {
    // Получаем строку параметра и разбиваем на массив по разделителю
    $array = explode(",", $_GET['array']);

    // Проверяем пустоту массива
    if (count($array) == 0) {
        // Выводим сообщение о том, что массив пуст
        print('Array is empty');

        // Прерываем выполнение программы
        exit(0);
    }

    // Выводим первоначальный массив на экран
    print('Array: ' .
        implode(', ', $array));

    // Сортировка массива
    sortArray($array);

    // Выводим отсортированный массив
    print(nl2br("\r\n"));
    print('Sorted array: ' . implode(', ', $array));
}

// Функция сортировки массива
function sortArray(&$arr) {
    // Проходим по массиву дважды
    for ($i = 0; $i < count($arr) - 1; $i++) {
        for ($j = 0; $j < count($arr) - 1; $j++) {
            // Если значение текущей больше, чем следующей,
            // то меняем значения местами.
            if ($arr[$j] > $arr[$j + 1]) {
                // Меняем ячейки местами
                $temp = $arr[$j + 1];
                $arr[$j + 1] = $arr[$j];
                $arr[$j] = $temp;
            }
        }
    }
}

?>
</body>
</html>