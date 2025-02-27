<?php
function getResultMathOperation(int $arg1, int $arg2, string $operation)
{
    switch ($operation) {
        case "+":
            return $arg1 + $arg2;
        case "-":
            return $arg1 - $arg2;
        case "*":
            return $arg1 * $arg2;
        case "/":
            return $arg1 / $arg2;
    }
}

echo getResultMathOperation(2, 2, "+") . '<br>';
echo getResultMathOperation(3, 3, "*") . '<br>';

$sityesInRegion = array(
    "Московская область" => array("Москва", "Зеленоград", "Клин"),
    "Ленинградская область" => array("Санкт-Петербуг", "Всеволожск", "Павловск", "Кронштадт"),
    "Рязанская область" => array("Рязань", "Касимов", "Скопин", "Рыбное", "Сасово"),
    "Свердловская область" => array("Екатеринбург", "Нижний Тагил", "Каменск-Уральский", "Первоуральск", "Серов")
);

foreach ($sityesInRegion as $regionKey => $region) {
    echo "Города из " . $regionKey . ':<br><br>';
    foreach ($region as $sity) {
        echo ' ' . $sity . '<br>';
    }
    echo '<br><br>';
}

function getTranslitationString(string $text): string
{
    $transliterationLetters = array(
        "a" => "а",
        "b" => "б",
        "c" => "ц",
        "d" => "д",
        "e" => "э",
        "ee" => "и",
        "f" => "ф",
        "g" => "г",
        "h" => "х",
        "i" => "ай",
        "j" => "дж",
        "k" => "к",
        "l" => "л",
        "m" => "м",
        "n" => "н",
        "o" => "о",
        "oo" => "у",
        "p" => "п",
        "q" => "к",
        "r" => "р",
        "s" => "с",
        "t" => "т",
        "u" => "у",
        "v" => "в",
        "w" => "в",
        "x" => "кс",
        "y" => "й",
        "z" => "з"
    );
    $textArray = str_split(strtolower($text));
    $translitArrayText = [];
    foreach ($textArray as $letter) {
        array_push($translitArrayText, $transliterationLetters[$letter]);
    }
    return implode("", $translitArrayText);

}

echo getTranslitationString("open") . '<br>';
echo getTranslitationString("return") . '<br>';

function power(int $val, int $pow): int
{
    if ($pow == 1) {
        return $val;
    }
    return $val * power($val, $pow - 1);
}
echo power(2, 2) . '<br>';
echo power(3, 3) . '<br>';
echo power(5, 5) . '<br>';

function getTimeToString(): string
{
    $timeArray = explode("-", date("H-i"));
    $hours = "";
    $minutes = "";

    $hoursString = (int) $timeArray[0];
    if ($hoursString == 1 || $hoursString == 21) {
        $hours = "$hoursString час";
    } elseif (($hoursString >= 2 && $hoursString <= 4) || ($hoursString >= 22 && $hoursString <= 24)) {
        $hours = "$hoursString часа";
    } else {
        $hours = "$hoursString часов";
    }

    $minutesString = (int) $timeArray[1];
    switch ($minutesString) {
        case 1:
        case 21:
        case 31:
        case 41:
        case 51:
            $minutes = "$minutesString минута";
            break;
        case 2:
        case 3:
        case 4:
        case 22:
        case 23:
        case 24:
        case 32:
        case 33:
        case 34:
        case 42:
        case 43:
        case 44:
        case 52:
        case 53:
        case 54:
            $minutes = "$minutesString минуты";
            break;
        default:
            $minutes = "$minutesString минут";
    }
    return $hours . " " . $minutes;
}
echo date("H-i") . '<br>';
echo getTimeToString() . '<br>';
?>