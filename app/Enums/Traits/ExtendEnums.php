<?php

namespace App\Enums\Traits;

use BackedEnum;

/** Snippet extracted from [ArchTech\Enums] <github.com/archtechx/enums> */
trait ExtendEnums
{
    /** Get an associative array of [case name => case value]. */
    public static function options(): array
    {
        $cases = static::cases();

        return isset($cases[0]) && $cases[0] instanceof BackedEnum
            ? array_column($cases, 'name', 'value')
            : array_column($cases, 'name');
    }

    /** Get an array of case values. */
    public static function values(): array
    {
        $cases = static::cases();

        return isset($cases[0]) && $cases[0] instanceof BackedEnum
            ? array_column($cases, 'value')
            : array_column($cases, 'name');
    }

    /** Get an array of case names. */
    public static function names(): array
    {
       return array_column(static::cases(), 'name');
    }
}
