<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Footer extends Model {
    use HasFactory;
    protected $fillable = [
        'location', 'phone', 'email', 'description', 'facebook', 'twitter',
        'linkedin', 'instagram', 'pinterest', 'opening_hours'
    ];
}
