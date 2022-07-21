<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected  $guarded = [];

    protected $casts = [
        'notification_body' => 'array',
        'info' => 'array'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
