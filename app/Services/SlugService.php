<?php

namespace App\Services;

use Illuminate\Support\Str;

class SlugService
{
    public static function make(string $string, string $separator = "-", $language = "en", ?callable $unique = null): string
    {
        $slug = Str::slug($string, $separator, $language);
        $originalSlug = $slug;
        $count = 1;

        while (is_callable($unique) && $unique($slug)) {
            $slug = $originalSlug . '-' . $count++;
        }

        return $slug;
    }
}
