<?php
// getPartsFromFullname принимает как аргумент одну строку — склеенное ФИО.
// Возвращает как результат массив из трёх элементов с ключами ‘name’, ‘surname’ и ‘patronomyc’.
// Пример: как аргумент принимается строка «Иванов Иван Иванович»,
// а возвращается массив [‘surname’ => ‘Иванов’ ,‘name’ => ‘Иван’, ‘patronomyc’ => ‘Иванович’]

$examle_fullname = 'Аль-Хорезми Мухаммад Ибн-Муса';

function getPartsFromFullname($examle_fullname) {
    $arr_fullname_elem = explode(' ', $examle_fullname);
    $fullname_keys = ['surname', 'name', 'patronomyc',];
    return array_combine($fullname_keys, $arr_fullname_elem);     
};

//print_r (getPartsFromFullname($examle_fullname));