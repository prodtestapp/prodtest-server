<?php

namespace App\Enums;

enum ProjectBackgroundColor: string
{
    case BG_GRAY_400 = "bg-gray-400";
    case BG_RED_400 = "bg-red-400";
    case BG_YELLOW_400 = "bg-yellow-400";
    case BG_GREEN_400 = "bg-green-400";
    case BG_BLUE_400 = "bg-blue-400";
    case BG_INDIGO_400 = "bg-indigo-400";
    case BG_PURPLE_400 = "bg-purple-400";
    case BG_PINK_400 = "bg-pink-400";
    case BG_GRAY_300 = "bg-gray-300";
    case BG_RED_300 = "bg-red-300";
    case BG_YELLOW_300 = "bg-yellow-300";
    case BG_GREEN_300 = "bg-green-300";
    case BG_BLUE_300 = "bg-blue-300";
    case BG_INDIGO_300 = "bg-indigo-300";
    case BG_PURPLE_300 = "bg-purple-300";
    case BG_PINK_300 = "bg-pink-300";
    case BG_GRAY_500 = "bg-gray-500";
    case BG_RED_500 = "bg-red-500";
    case BG_YELLOW_500 = "bg-yellow-500";
    case BG_GREEN_500 = "bg-green-500";
    case BG_BLUE_500 = "bg-blue-500";
    case BG_INDIGO_500 = "bg-indigo-500";
    case BG_PURPLE_500 = "bg-purple-500";
    case BG_PINK_500 = "bg-pink-500";

    public static function getValues(): array
    {
        return [
            self::BG_GRAY_400,
            self::BG_RED_400,
            self::BG_YELLOW_400,
            self::BG_GREEN_400,
            self::BG_BLUE_400,
            self::BG_INDIGO_400,
            self::BG_PURPLE_400,
            self::BG_PINK_400,
            self::BG_GRAY_300,
            self::BG_RED_300,
            self::BG_YELLOW_300,
            self::BG_GREEN_300,
            self::BG_BLUE_300,
            self::BG_INDIGO_300,
            self::BG_PURPLE_300,
            self::BG_PINK_300,
            self::BG_GRAY_500,
            self::BG_RED_500,
            self::BG_YELLOW_500,
            self::BG_GREEN_500,
            self::BG_BLUE_500,
            self::BG_INDIGO_500,
            self::BG_PURPLE_500,
            self::BG_PINK_500,
        ];
    }

    public static function getValuesCount(): int
    {
        return count(self::getValues());
    }
}
