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

// Функция сортировки вставками
function sortArray(&$arr) {
    // Длина массива
    $arrLen = count($arr);

    // Выбранный шаг
    $gap = 0;
    while($gap < (int)($arrLen / 3)) {
        $gap = $gap * 3 + 1;
    }

    // Пока шаг больше нуля
    while ($gap > 0) {
        // Сортируем массив вставками, разбивая его на подмассивы
        // пошагово. Элементы для подмассива берутся из массива
        // через выбранный шаг.
        for ($i = $gap; $i < $arrLen; $i++) {
            $j = $i;
            $tmp = $arr[$i];
            while($j >= $gap && $arr[$j - $gap] > $tmp) {
                $arr[$j] = $arr[$j - $gap];
                $j = $j - $gap;
            }
            $arr[$j] = $tmp;
        }
        $gap = (int)(($gap - 1) / 3);
    }
}
?>
</body>
</html>