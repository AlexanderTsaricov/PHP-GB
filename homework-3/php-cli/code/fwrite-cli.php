<?php

$address = '/code/birthdays.txt';

$name = readline("Введите имя: ");
$date = readline("Введите дату рождения в формате ДД-ММ-ГГГГ: ");

if (validate($date, $name)) {
    $data = $name . ", " . $date . "\r\n";

    $fileHandler = fopen($address, 'a');

    if (fwrite($fileHandler, $data)) {
        echo "Запись $data добавлена в файл $address";
    } else {
        echo "Произошла ошибка записи. Данные не сохранены";
    }

    fclose($fileHandler);
} else {
    echo "Введена некорректная информация";
}

function validate(string $date, string $name): bool
{
    $dateBlocks = explode("-", $date);

    if (count($dateBlocks) < 3) {
        return false;
    }

    foreach ($dateBlocks as $dateBlock) {
        if (!isset($dateBlock) || !is_numeric($dateBlock)) {
            return false;
        }
    }

    if ($dateBlocks[0] > 31) {
        return false;
    }

    if ($dateBlocks[0] > 12) {
        return false;
    }

    if ($dateBlocks[2] > date('Y')) {
        return false;
    }

    if ($dateBlocks[2] < 1930) {
        return false;
    }

    if (count($name) < 3) {
        return false;
    }

    return true;
}
// Добавлена проверка на год. Год не должен быть меньше 1930
// Добавлена проверка на число. Вводимые данныые не должны быть буквами.
// Добавлена проверка имени, количество символов не должно быть меньше 3
