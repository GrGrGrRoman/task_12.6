<?php
include 'getPartsFromFullnameFunc.php';

// Функция определения пола по ФИО getGenderFromName,
// принимающую как аргумент строку, содержащую ФИО (вида «Иванов Иван Иванович»).
// если присутствует признак мужского пола — прибавляем единицу
// если присутствует признак женского пола — отнимаем единицу
// после проверок всех признаков, если «суммарный признак пола» больше нуля — возвращаем 1 (мужской пол)
// после проверок всех признаков, если «суммарный признак пола» меньше нуля — возвращаем -1 (женский пол)
// после проверок всех признаков, если «суммарный признак пола» равен 0 — возвращаем 0 (неопределенный пол)

function getGenderFromName($examle_fullname) {
    $arr_fullname = (getPartsFromFullname($examle_fullname));

    $summary_of_sex = 0;

    $surname1 = mb_substr(($arr_fullname)['surname'], -1, 1);
    $surname2 = mb_substr(($arr_fullname)['surname'], -2, 2);
    $name = mb_substr(($arr_fullname)['name'], -1, 1);
    $patronomyc2 = mb_substr(($arr_fullname)['patronomyc'], -2, 2);
    $patronomyc3 = mb_substr(($arr_fullname)['patronomyc'], -3, 3);

    ($surname2 == 'ва') ? --$summary_of_sex : $summary_of_sex;
    ($surname1 == 'в') ? ++$summary_of_sex : $summary_of_sex;
    ($name == 'а') ? --$summary_of_sex : $summary_of_sex;
    ($name == 'й' || $name == 'н') ? ++$summary_of_sex : $summary_of_sex;
    ($patronomyc3 == 'вна') ? --$summary_of_sex : $summary_of_sex;
    ($patronomyc2 == 'ич') ? ++$summary_of_sex : $summary_of_sex;

    return $summary_of_sex <=> 0;
};

//print_r (getGenderFromName($examle_fullname));
