<?php

/**
 * @charset UTF-8
 *
 * Задание 2. Работа с массивами и строками.
 *
 * Есть список временных интервалов (интервалы записаны в формате чч:мм-чч:мм).
 *
 * Необходимо написать две функции:
 *
 *
 * Первая функция должна проверять временной интервал на валидность
 *    принимать она будет один параметр: временной интервал (строка в формате чч:мм-чч:мм)
 *    возвращать boolean
 *
 *
 * Вторая функция должна проверять "наложение интервалов" при попытке добавить новый интервал в список существующих
 *    принимать она будет один параметр: временной интервал (строка в формате чч:мм-чч:мм)
 *  возвращать boolean
 *
 *  "наложение интервалов" - это когда в промежутке между началом и окончанием одного интервала,
 *   встречается начало, окончание или то и другое одновременно, другого интервала
 *
 *  пример:
 *
 *  есть интервалы
 *    "10:00-14:00"
 *    "16:00-20:00"
 *
 *  пытаемся добавить еще один интервал
 *    "09:00-11:00" => произошло наложение
 *    "11:00-13:00" => произошло наложение
 *    "14:00-16:00" => наложения нет
 *    "14:00-17:00" => произошло наложение
 */

# Можно использовать список:

$list = array(
    '09:00-11:00',
    '11:00-13:00',
    '15:00-16:00',
    '17:00-20:00',
    '20:30-21:30',
    '21:30-22:30',
);

function validateDate( $str ): bool
{
    $delimeter  = '-';
    $delimeter2 = ':';

    $regexp24 = ( "([01]?[0-9]|2[0-3]):[0-5][0-9](:[0-5][0-9])?" );
    if( !preg_match( "/^" . $regexp24 . $delimeter . $regexp24 . "$/", $str ) ) {
        return FALSE;
    }

    //проверить чтобы первое значение было не больше второго
    $time = explode( $delimeter, $str );

    $time1    = explode( $delimeter2, $time[ 0 ] );
    $hours1   = $time1[ 0 ];
    $minutes1 = $time1[ 1 ];
    $time2    = explode( $delimeter2, $time[ 1 ] );
    $hours2   = $time2[ 0 ];
    $minutes2 = $time2[ 1 ];

    $totalMinutes1 = $hours1 * 60 + $minutes1;
    $totalMinutes2 = $hours2 * 60 + $minutes2;

    if( $totalMinutes1 < $totalMinutes2 ) {
        return TRUE;
    }

    return FALSE;
}

function checkInterseption( $str ): bool
{
    global $list;

    $delimeter  = '-';
    $delimeter2 = ':';

    $time = explode( $delimeter, $str );

    $time1    = explode( $delimeter2, $time[ 0 ] );
    $hours1   = $time1[ 0 ];
    $minutes1 = $time1[ 1 ];
    $time2    = explode( $delimeter2, $time[ 1 ] );
    $hours2   = $time2[ 0 ];
    $minutes2 = $time2[ 1 ];

    $totalMinutes1 = $hours1 * 60 + $minutes1;
    $totalMinutes2 = $hours2 * 60 + $minutes2;

    foreach( $list as $item ) {
        $time = explode( $delimeter, $item );

        $time1    = explode( $delimeter2, $time[ 0 ] );
        $hours1   = $time1[ 0 ];
        $minutes1 = $time1[ 1 ];
        $time2    = explode( $delimeter2, $time[ 1 ] );
        $hours2   = $time2[ 0 ];
        $minutes2 = $time2[ 1 ];

        $itemMinutes1 = $hours1 * 60 + $minutes1;
        $itemMinutes2 = $hours2 * 60 + $minutes2;

        //Сравнить первый интервал
        if( ( $totalMinutes1 > $itemMinutes1 && $totalMinutes1 < $itemMinutes2 ) ||
            ( $totalMinutes2 > $itemMinutes1 && $totalMinutes2 < $itemMinutes2 ) ||
            ( $itemMinutes1 > $totalMinutes1 && $itemMinutes1 < $totalMinutes2 ) ||
            ( $itemMinutes2 > $totalMinutes1 && $itemMinutes2 < $totalMinutes2 ) ||
            ( $itemMinutes1 === $totalMinutes1 && $itemMinutes2 === $totalMinutes2 ) ) {
            return TRUE;
        }
    }
    return FALSE;
}

var_dump( validateDate( $list[ 5 ] ) );
var_dump( validateDate( '23:30-22:30' ) ); // False потому что первое значение больше


var_dump( checkInterseption( '09:00-10:00' ) );
var_dump( checkInterseption( '18:00-19:00' ) );
var_dump( checkInterseption( '23:00-00:00' ) );

?>
