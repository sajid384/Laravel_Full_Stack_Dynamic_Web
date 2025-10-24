<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{

    use HasFactory;

    protected $fillable = ['fields'];

    // Convert fields from JSON to Array
    protected $casts = [
        'fields' => 'array',
    ];
}
