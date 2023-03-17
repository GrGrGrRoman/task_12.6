<?php
// getFullnameFromParts принимает как аргумент три строки — фамилию, имя и отчество.
// Возвращает как результат их же, но склеенные через пробел.
// Пример: как аргументы принимаются три строки «Иванов», «Иван» и «Иванович»,
// а возвращается одна строка — «Иванов Иван Иванович»

$surname = 'Иванов';
$name = 'Петр';
$patronomyc = 'Евгеньевич';

function getFullnameFromParts($surname, $name, $patronomyc) {
    return $surname . ' ' . $name . ' ' . $patronomyc;
};

//print_r (getFullnameFromParts($surname, $name, $patronomyc));