<?php

// function readAllFunction(string $address) : string {
function readAllFunction(array $config): string
{
    $address = $config['storage']['address'];

    if (file_exists($address) && is_readable($address)) {
        $file = fopen($address, "rb");

        $contents = '';

        while (!feof($file)) {
            $contents .= fread($file, 100);
        }

        fclose($file);
        return $contents;
    } else {
        return handleError("Файл не существует");
    }
}

// function addFunction(string $address) : string {
function addFunction(array $config): string
{
    $address = $config['storage']['address'];

    $name = readline("Введите имя: ");
    $date = readline("Введите дату рождения в формате ДД-ММ-ГГГГ: ");
    $data = $name . ", " . $date . "\r\n";

    $fileHandler = fopen($address, 'a');

    if (fwrite($fileHandler, $data)) {
        return "Запись $data добавлена в файл $address";
    } else {
        return handleError("Произошла ошибка записи. Данные не сохранены");
    }

    fclose($fileHandler);
}

// function clearFunction(string $address) : string {
function clearFunction(array $config): string
{
    $address = $config['storage']['address'];

    if (file_exists($address) && is_readable($address)) {
        $file = fopen($address, "w");

        fwrite($file, '');

        fclose($file);
        return "Файл очищен";
    } else {
        return handleError("Файл не существует");
    }
}

function helpFunction()
{
    return handleHelp();
}

function readConfig(string $configAddress): array|false
{
    return parse_ini_file($configAddress, true);
}

function readProfilesDirectory(array $config): string
{
    $profilesDirectoryAddress = $config['profiles']['address'];

    if (!is_dir($profilesDirectoryAddress)) {
        mkdir($profilesDirectoryAddress);
    }

    $files = scandir($profilesDirectoryAddress);

    $result = "";

    if (count($files) > 2) {
        foreach ($files as $file) {
            if (in_array($file, ['.', '..']))
                continue;

            $result .= $file . "\r\n";
        }
    } else {
        $result .= "Директория пуста \r\n";
    }

    return $result;
}

function readProfile(array $config): string
{
    $profilesDirectoryAddress = $config['profiles']['address'];

    if (!isset($_SERVER['argv'][2])) {
        return handleError("Не указан файл профиля");
    }

    $profileFileName = $profilesDirectoryAddress . $_SERVER['argv'][2] . ".json";

    if (!file_exists($profileFileName)) {
        return handleError("Файл $profileFileName не существует");
    }

    $contentJson = file_get_contents($profileFileName);
    $contentArray = json_decode($contentJson, true);

    $info = "Имя: " . $contentArray['name'] . "\r\n";
    $info .= "Фамилия: " . $contentArray['lastname'] . "\r\n";

    return $info;
}

function getPeoplaWithBirthdayToday(array $config): string
{
    $address = $config['storage']['address'];
    $todayDate = date("d-m");
    $todayDateArray = explode("-", $todayDate);


    if (file_exists($address) && is_readable($address)) {
        $file = fopen($address, "r");
        $contents = '';
        $result = "";

        while (!feof($file)) {
            $contents .= fread($file, 100);
        }
        $contentsArray = explode("\n", $contents);
        foreach ($contentsArray as $people) {
            $peopleArray = explode(",", $people);
            $peopleBirthdayArray = explode("-", $peopleArray[1]);
            if ($peopleBirthdayArray[0] == $todayDateArray[0] && $peopleBirthdayArray[1] == $todayDateArray[1]) {
                $result .= $peopleArray[0] . " " . $peopleArray[1] . "\r\n";
            }
        }
        fclose($file);
        return $result;
    } else {
        return handleError("Файл не существует");
    }
}

function detelePeople(array $config): string
{
    $address = $config['storage']['address'];
    $name = readline("Введите имя: ");
    $deleteBoolReult = false;
    $result = "";
    $newResultArray = [];
    if (file_exists($address) && is_readable($address)) {
        $file = fopen($address, "r");
        $contents = '';

        while (!feof($file)) {
            $contents .= fread($file, 100);
        }
        $contentsArray = explode("\n", $contents);
        foreach ($contentsArray as $people) {
            $peopleArray = explode(",", $people);
            if ($peopleArray[0] == $name) {
                $deleteBoolReult = true;
                continue;
            }
            array_push($newResultArray, $people . "\r\n");
        }
        fclose($file);
        $file = fopen($address, "w");
        fwrite($file, '');
        fclose($file);
        $file = fopen($address, 'a');
        foreach ($newResultArray as $people) {
            fwrite($file, $people);
        }
        fclose($file);
        if ($deleteBoolReult) {
            $result .= "Удаление произведено успешно";
        } else {
            $result .= handleError("Такого человека не существует");
        }
        return $result;
    } else {
        return handleError("Файл не существует");
    }
}