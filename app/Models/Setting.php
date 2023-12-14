<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

     // Specify the fillable columns to allow mass assignment
    protected $fillable = ['key', 'value'];

    /**
     * Get the value for a given key.
     *
     * @param  string  $key
     * @return mixed
     */
    public static function getValue(string $key)
    {
        $setting = self::where('key', $key)->first();

        return $setting ? $setting->value : null;
    }

    /**
     * Set the value for a given key.
     *
     * @param  string  $key
     * @param  mixed  $value
     * @return bool
     */
    public static function setValue(string $key, $value)
    {
        return self::updateOrCreate(['key' => $key], ['value' => $value]);
    }

}
