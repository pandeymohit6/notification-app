<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Notification extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'notification_type',
        'exp_time',
        'content'
    ];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'notifiable_id', 'id');
    }
}
