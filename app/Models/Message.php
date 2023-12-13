<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'type_id',
        'content',
        'url'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function msgtype()
    {
        return $this->hasOne(MsgType::class);
    }
}
