<?php

/**
 * Convert anemometr sensor value to deegree
 * @param $index
 * @return int
 */
function convert_anemometr_data($index)
{
    $_wind_dir = [
        1  => 0,
        12 => 22,
        2  => 45,
        23 => 67,
        3  => 90,
        34 => 112,
        4  => 135,
        45 => 157,
        5  => 180,
        56 => 202,
        6  => 225,
        67 => 247,
        7  => 270,
        78 => 292,
        8  => 315,
        81 => 337
    ];

    return key_exists($index, $_wind_dir) ? $_wind_dir[$index] : 0;
}

/**
 * Convert wind direction degree to index value
 * @param $data_bit
 * @return int
 */
function convert_degree_to_direct($degree)
{
    if ($degree == 0) return 0;

    $_range = [
        '0' => ['min' => 337, 'max' => 22],
        '1' => ['min' => 22, 'max' => 67],
        '2' => ['min' => 67, 'max' => 112],
        '3' => ['min' => 112, 'max' => 157],
        '4' => ['min' => 157, 'max' => 202],
        '5' => ['min' => 202, 'max' => 247],
        '6' => ['min' => 247, 'max' => 292],
        '7' => ['min' => 292, 'max' => 337],
    ];

    foreach ($_range as $index => $group)
    {
        if ($degree >= $group['min'] && $degree < $group['max'])
        {
            return $index;
        }
    }
}

/**
 * Convert wind direction degree to russian name
 * @param $data_bit
 * @return int
 */
function convert_degree_to_name($degree)
{
    if ($degree == 0) return 'Север';

    $_range = [
        'Север'         => ['min' => 337, 'max' => 22],
        'Северо-восток' => ['min' => 22, 'max' => 67],
        'Восток'        => ['min' => 67, 'max' => 112],
        'Юго-восток'    => ['min' => 112, 'max' => 157],
        'Юг'            => ['min' => 157, 'max' => 202],
        'Юго-запад'     => ['min' => 202, 'max' => 247],
        'Запад'         => ['min' => 247, 'max' => 292],
        'Северо-запад'  => ['min' => 292, 'max' => 337],
    ];

    foreach ($_range as $index => $group)
    {
        if ($degree >= $group['min'] && $degree < $group['max'])
        {
            return $index;
        }
    }
}

/**
 * Convert 8bit wind index direction to degree
 * @param $key
 * @return int
 */
function convert_index_to_deegre($key)
{
    if ($key == 0) return 0;

    $_map = [
        1 => 45,
        2 => 90,
        3 => 135,
        4 => 180,
        5 => 225,
        6 => 270,
        7 => 315
    ];

    return $_map[$key];
}

/**
 * Convert wind speed to index for wind rose chart
 * @param $wind_speed
 * @return int
 */
function convert_wind_speed($wind_speed)
{
    $wind_speed = (int) $wind_speed;

    if ($wind_speed > 0 && $wind_speed <= 1)
        return 0;
    else if ($wind_speed > 1 && $wind_speed <= 3)
        return 1;
    else if ($wind_speed > 3 && $wind_speed <= 5)
        return 2;
    else if ($wind_speed > 5 && $wind_speed <= 7)
        return 3;
    else if ($wind_speed > 7 && $wind_speed <= 9)
        return 4;
    else
        return 5;
}