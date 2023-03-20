<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'user_id',
        'status',
        'description',
    ];

    protected $casts = [
        'created_at' => 'datetime:d.m.Y H:00',
    ];
}
