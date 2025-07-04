<?php

namespace App\Enums;

enum UserRole: string
{
    case SUPER_ADMIN = 'super_admin';
    case ADMIN = 'admin';
    case INSTRUCTOR = 'instructor';
    case LEARNER = 'learner';
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
