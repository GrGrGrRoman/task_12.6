<?php
include 'getGenderFromNameFunc.php';
include 'persons.php';

// Функция getGenderDescription для определения полового состава аудитории
// Как аргумент в функцию передается массив $persons
// Как результат функции возвращается информация $report
// Использованы для решения: конструкция foreach, функция подсчета элементов массива, функцию getGenderFromName, округление

function getGenderDescription($persons) {
    $count_male = 0;
    $count_female = 0;
    $count_unknown = 0;

    // конструкция foreach с функцией getGenderFromName
    foreach ($persons as $key => $gender_flag) {
        $gender_flag = (getGenderFromName($persons[$key]['fullname']));
        if ($gender_flag == 1) {++$count_male;};
        if ($gender_flag == 0) {++$count_unknown;};
        if ($gender_flag == -1) {++$count_female;};
    };
    
    // функция подсчета элементов массива
    $persons_length = count($persons);
    
    // округление
    $male_cent = round(($count_male / $persons_length) * 100, 2);
    $female_cent = round(($count_female / $persons_length) * 100, 2);
    $unknown_cent = round(($count_unknown / $persons_length) * 100, 2);
    
    $report = <<<REPORT
    Гендерный состав аудитории:
    ---------------------------
    Мужчины - $male_cent%
    Женщины - $female_cent%
    Не удалось определить - $unknown_cent%
    REPORT;
    
    return $report;
};

//print_r(getGenderDescription($persons));
