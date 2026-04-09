<?php

use App\Models\Setting;

if (!function_exists('setting')) {
    /**
     * Get a setting value by key.
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    function setting($key, $default = null)
    {
        $settings = Setting::first();
        if ($settings && isset($settings->$key)) {
            return $settings->$key;
        }
        return $default;
    }
}
