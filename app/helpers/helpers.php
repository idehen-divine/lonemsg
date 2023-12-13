<?php

use Illuminate\Support\Facades\File;

include_once 'settings.php';

if (!function_exists('getUserImage')) {
    /**
     * Get the a user image.
     *
     * @param  string|null $image image object from the user row
     * @param  string|null $gender gender object from the user row
     * @return string
     */
    function getUserImage($image = null, $gender = null)
    {
        $defaultImage = asset('assets/img/profiles/broken.jpeg');

        if (!empty($image)) {
            $imagePath = public_path('assets/' . $image);

            if (File::exists($imagePath)) {
                return asset('assets/' . $image);
            } else {
                return $defaultImage; // Show broken image if image file doesn't exist
            }
        }

        if ($gender == 'male') {
            return asset('assets/img/profiles/male.jpeg');
        } elseif ($gender == 'female') {
            return asset('assets/img/profiles/female.jpeg');
        }

        return $defaultImage; // Show broken image if no image or gender is provided
    }
}

if (!function_exists('profileImage')) {
    /**
     * Get the profile image of an authenticated user.
     *
     * @param  null
     *@return string
     */
    function profileImage()
    {
        $defaultImage = asset('assets/img/profiles/broken.jpeg');

        if (!empty($image)) {
            $imagePath = public_path('assets/' . auth()->user()->image);

            if (File::exists($imagePath)) {
                return asset('assets/' . auth()->user()->image);
            } else {
                return $defaultImage; // Show broken image if image file doesn't exist
            }
        }

        if (auth()->user()->gender == 'male') {
            return asset('assets/img/profiles/male.jpeg');
        } elseif (auth()->user()->gender == 'female') {
            return asset('assets/img/profiles/female.jpeg');
        }

        return $defaultImage; // Show broken image if no image or gender is provided
    }
}

if (!function_exists('get_date')) {
    /**
     * Get the available functions.
     *
     * @param  string $date String from timestamp coulom
     *@return string
     */
    function get_date($date)
    {
        return date("jS M, y", strtotime($date));
    }
}

if (!function_exists('remSpace')) {
    /**
     * Replace all spaces in a string with underscore.
     *
     * @param  string $key String to format
     *@return string
     */
    function remSpace($key)
    {
        return str_replace(' ', '_', $key);
    }
}

if (!function_exists('addSpace')) {
    /**
     * Replace all underscore in a string with spaces.
     *
     * @param  string $key String to format
     *@return string
     */
    function addSpace($key)
    {
        return str_replace('_', ' ', $key);
    }
}

if (!function_exists('userPrefix')) {
    /**
     * Add a user user prefix based on the gender.
     *
     * @param  string $gender String from user table
     *@return string
     */
    function userPrefix($gender)
    {
        $return = '';
        if ($gender == 'male') {
            $return = 'Mr.';
        } elseif ($gender == 'female') {
            $return = 'Mrs.';
        }
        return $return;
    }
}
