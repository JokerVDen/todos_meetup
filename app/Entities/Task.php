<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'name',
        'email',
        'image',
        'text',
    ];
}
