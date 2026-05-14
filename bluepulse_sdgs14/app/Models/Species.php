<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Species extends Model
{
    protected $fillable = [
        'name',
        'latin_name',
        'description',
        'habitat',
        'image'
    ];
}