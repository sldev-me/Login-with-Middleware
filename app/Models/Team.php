<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use softDeletes;

    protected $fillable = [
        'name', 'country', 'about', 'languages', 'gender', 'photo', 'gallery'
    ];

    protected $casts = [
        'languages' => 'array',
        'gallery' => 'array',
    ];
}
