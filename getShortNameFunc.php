<?php
include 'getPartsFromFullnameFunc.php';

// Функция getShortName, принимает как аргумент строку,
// содержащую ФИО вида «Иванов Иван Иванович» и возвращает строку вида «Иван И.»,
// где сокращается фамилия и отбрасывается отчество.
// Для разбиения строки на составляющие использована функция getPartsFromFullname

function getShortName($examle_fullname) {
    $arr_fullname = (getPartsFromFullname($examle_fullname));
    $short_surname = mb_substr(($arr_fullname['surname']), 0, 4) . ' ';
    $short_name = mb_substr(($arr_fullname['name']), 0, 1) . '.';
    unset ($arr_fullname['patronomyc']);
    return $short_surname . $short_name;
};

// print_r (getShortName($examle_fullname));
