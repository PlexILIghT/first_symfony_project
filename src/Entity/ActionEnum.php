<?php

namespace App\Enums;

enum ActionEnum: string
{
    case BUY = 'buy';
    case SELL = 'sell';

    public function getOppositeAction(): 
    {
        return match($this) {
            self::BUY => self::SELL,
            self::SELL => self::BUY,
        }
    }
}
