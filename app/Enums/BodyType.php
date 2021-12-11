<?php

namespace App\Enums;

enum BodyType: string
{
    case JSON = 'json';
    case XML = 'xml';
    case RAW = 'raw';
    case HTML = 'html';

    public static function getValues(): array
    {
        return [
            self::JSON,
            self::XML,
            self::RAW,
            self::HTML,
        ];
    }
}
