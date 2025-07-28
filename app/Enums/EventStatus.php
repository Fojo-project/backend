<?php
// app/Enums/Status.php


namespace App\Enums;

enum EventStatus: string
{
    case CANCELLED = 'cancelled';
    case ENDED = 'ended';
    case SCHEDULED = 'scheduled';
    case POSTPONED = 'postponed';
    case LIVE = 'live';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
