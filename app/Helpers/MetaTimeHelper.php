<?php

namespace App\Helpers;

use Carbon\Carbon;

class MetaTimeHelper {
    private const REQUEST_TIME = 'request_time';
    public static function addTimestamps(array $timeFields): array {
        $timestamps = [];
        foreach ($timeFields as $field) {
            $timestamps[$field] = self::chooseTimestamp($field);
        }
        return ["timestamps" => $timestamps];
    }
    private static function chooseTimestamp(string $timestamp): string {
        return match ($timestamp) {
            self::REQUEST_TIME => Carbon::now()->toDateTimeString(),
            default => '...',
        };
    }
}
