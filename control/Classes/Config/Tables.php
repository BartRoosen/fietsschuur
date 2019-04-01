<?php

namespace Classes\Config;

class Tables
{
    const TABLE_TYPES      = 'bike_types';
    const TABLE_BRANDS     = 'brands';
    const TABLE_SIZE_FRAME = 'size_frame';
    const TABLE_SIZE_WHEEL = 'size_wheel';
    const TABLE_BIKES      = 'bikes';

    const TABLES = [
//        self::TABLE_TYPES      => 'AI_TYPE',
        self::TABLE_BRANDS     => 'NM_BRAND',
        self::TABLE_SIZE_FRAME => 'CD_SIZE_FRAME',
        self::TABLE_SIZE_WHEEL => 'CD_SIZE_WHEEL',
//        self::TABLE_BIKES      => 'AI_BIKE',
    ];
}