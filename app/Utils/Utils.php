<?php

namespace App\Utils;

class Utils
{
    public static function extractCloudinaryPublicId(string $url): ?string
    {
        $matches = [];
        $pattern = '#/upload/[^/]+/(.+)\.[a-zA-Z0-9]+$#';
        return preg_match($pattern, $url, $matches) ? $matches[1] : null;
    }

    public static function formatSize(int $bytes, int $precision = 2): string
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        $power = $bytes > 0 ? floor(log($bytes, 1024)) : 0;
        return round($bytes / (1024 ** $power), $precision) . ' ' . $units[$power];
    }
}

