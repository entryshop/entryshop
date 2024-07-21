<?php

namespace App\Support;

use App\Models\Setting;

class Helper
{
    public static function setting($key, $default = null)
    {
        if (is_array($key)) {
            foreach ($key as $k => $v) {
                Setting::updateOrCreate([
                    'key' => $k,
                ], [
                    'value' => $v,
                ]);
            }
            return;
        }
        return Setting::firstWhere('key', $key)->value ?? $default;
    }

}
