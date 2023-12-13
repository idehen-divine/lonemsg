<?php

use App\Models\Setting;

if (!function_exists('AppName')) {
    /**
     * Get the app name from sttings
     *
     *@return string
     */
    function AppName()
    {
        $name = Setting::getValue('app_name');

        return $name ? $name : 'Lonely';
    }
}

