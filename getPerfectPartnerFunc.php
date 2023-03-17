<?php
include 'persons.php';
include 'getGenderFromNameFunc.php';
include 'getFullnameFromPartsFunc.php';

// Функция getPerfectPartner для определения «идеальной» пары.
// Как первые три аргумента в функцию передаются строки с фамилией, именем и отчеством (именно в этом порядке).
// При этом регистр может быть любым: ИВАНОВ ИВАН ИВАНОВИЧ, ИваНов Иван иванович.
// Как четвертый аргумент в функцию передается массив $persons.

// Как результат функции возвращается информация в следующем виде:
// Иван И. + Наталья С. = 
// ♡ Идеально на 64.43% ♡
// Процент совместимости «Идеально на ...» — случайное число от 50% до 100% с точностью два знака после запятой

$surname = 'ПРОНИН';
$name = 'суреН';
$patronomyc = 'ОганЕсовИч';

function getPerfectPartner ($surname, $name, $patronomyc, $persons) {

// приводим фамилию, имя, отчество (переданных первыми тремя аргументами) к привычному регистру;
$surname = mb_convert_case($surname, MB_CASE_TITLE_SIMPLE);
$name = mb_convert_case($name, MB_CASE_TITLE_SIMPLE);
$patronomyc = mb_convert_case($patronomyc, MB_CASE_TITLE_SIMPLE);

// склеиваем ФИО, используя функцию getFullnameFromParts;
$fullname_1 = getFullnameFromParts($surname, $name, $patronomyc);

 // определяем пол первого партнера;
$sex_1 = getGenderFromName($fullname_1);

// случайным образом выбираем любого человека в массиве $persons;
function secondPers($persons) {
$persons_length = count($persons);
$random_key = rand(0, $persons_length - 1);
$fullname_2 = $persons[$random_key]['fullname'];
return $fullname_2;
}
$fullname_2 = secondPers($persons);

// определяем пол второго партнера;
$sex_2 = getGenderFromName($fullname_2);

// проверяем с помощью getGenderFromName, что выбранное из Массива ФИО - противоположного пола
while ($sex_1 == $sex_2 || $sex_1 == 0 || $sex_2 == 0) {
    $fullname_2 = secondPers($persons);
    $sex_2 = getGenderFromName($fullname_2);
}

// % совместимости
$compatibility = rand(0, 100) / 100 + rand(50, 99);

// засекречиваем имена партнёров
function getAbbrName($fullname_1) {
    $arr_fullname = (getPartsFromFullname($fullname_1));
    $short_surname = mb_substr(($arr_fullname['surname']), 0, 1) . '.';
    return $arr_fullname['name'] . ' ' . $short_surname;
}

// перепроверяем с помощью getGenderFromName, что выбранное из Массива ФИО - противоположного пола и выводим информацию
if ($sex_2 !== $sex_1) {
    $fullname_1_abbr = getAbbrName($fullname_1);
    $fullname_2_abbr = getAbbrName($fullname_2);
    $report = <<<REPORT
    $fullname_1_abbr + $fullname_2_abbr = 
    \u{2764} Идеально на $compatibility% \u{2764}
    REPORT;
    echo $report;
}  
};

getPerfectPartner ($surname, $name, $patronomyc, $persons);