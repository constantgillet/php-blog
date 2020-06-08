<?php

//Convert timestamp to redable date
function to_readable_date($timestamp) {

    $datetime_format = 'd/m/Y';

    $date = new DateTime('now', new DateTimeZone('Europe/Paris'));
    $date->setTimestamp($timestamp);

    return $date->format($datetime_format);
}

function get_article_id_from_url() {
    $string = $_SERVER['REQUEST_URI'];
    preg_match('~/article/(\d+)/~', $string, $m );

    return $m[1];
}