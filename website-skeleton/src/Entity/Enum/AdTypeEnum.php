<?php

namespace App\Entity\Enum;

/**
 * Class AdTypeEnum
 * @package App\Entity\Enum
 */
class AdTypeEnum
{
    const BUY = 'buy';
    const SELL = 'sell';

    public static $elements = [
        self::BUY => self::BUY,
        self::SELL => self::SELL,
    ];
}
