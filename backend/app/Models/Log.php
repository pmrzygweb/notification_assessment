<?php

namespace App\Models;

use App\Enums\MessageType;
use App\Enums\NotificationType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'message_type',
        'message_content',
        'notification_type',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'message_type' => MessageType::class,
        'notification_type' => NotificationType::class
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
