<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class amount extends Model
{
    use HasFactory;
    protected $fillable = [
        'drug',
        'price',
        'count',
        'total',
        'custemail',
    ];

}
