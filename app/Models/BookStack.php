<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookStack extends Model
{
    use HasFactory;

    protected $fillable = [
        'grid_size',
        'grid_data',
        'visible_stacks'
    ];

    protected $casts = [
        'grid_data' => 'array',
    ];
}
