<?php

namespace App\Enums;

enum Provider: string
{
    case FACEBOOK = 'facebook';
    case GOOGLE = 'google';
    case APPLE = 'apple';
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
