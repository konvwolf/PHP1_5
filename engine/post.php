<?php

// Это должно было работать с $_POST, но нет
// $countData = $_POST['toServer'];);
// updateSQLtable (PHOTOS, 'counter', 'counter + 1', "WHERE id = $countData");

$arrFromCookie = get_object_vars (json_decode ($_COOKIE['pic_viewed']));

if ($cookieID = $arrFromCookie['pic_id']) {
    $counter = getSQLdata (PHOTOS, 'counter', "WHERE id = $cookieID");
    if ($counter[0]['counter'] < $cookieCount = $arrFromCookie['curr_count']) {
        updateSQLtable (PHOTOS, 'counter', $cookieCount, "WHERE id = $cookieID");
    }
}