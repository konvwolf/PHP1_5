<?php

/**
 * Функция в качестве аргумента принимает путь до конкретной папки и "собирает"
 * все ее содержимое в массив. Точка и две точки из массива исключаются. Функция
 * возвращает массив с названиями найденных в папке объектов
 */
function scanDir4Files ($dir) {
    $fileList = scandir ($dir);
    array_splice ($fileList, 0, 2);
    return $fileList;
}


/**
 * Функция формирует запрос к базе данных и возвращает массив.
 * @param {string} $query_tbl - название таблицы, к которой будет сформировано
 * обращение. Обязательный параметр
 * @param {string} $query_col - запрос к колонке таблицы, стоящий после SELECT.
 * Обязательный параметр
 * @param {string} $query_supp - дополнительные параметры запроса, например,
 * ORDER BY. Необязательный параметр
 * @return {Array}
 */
function getSQLdata ($query_tbl, $query_col, $query_supp = null) {
    $connection = mysqli_connect (SITE, ADMIN, PASS, DATABASE) or die ('No connection');
    $query = mysqli_query ($connection, 'SELECT ' . $query_col . ' FROM ' . $query_tbl . ' ' . $query_supp . ' ') or die ('No result');
    $photosArr = [];
    while ($row = mysqli_fetch_assoc ($query)) {
        array_push ($photosArr, $row);
    }
    mysqli_free_result ($query);
    mysqli_close ($connection);
    return $photosArr;
}

function updateSQLtable ($query_tbl, $query_col, $query_data, $query_supp) {
    $connection = mysqli_connect (SITE, ADMIN, PASS, DATABASE) or die ('No connection');
    $query = mysqli_query ($connection, 'UPDATE ' . $query_tbl. ' SET ' .$query_col. ' = ' . $query_data . ' ' . $query_supp . ' ') or die ('No result');
    mysqli_close ($connection);
}