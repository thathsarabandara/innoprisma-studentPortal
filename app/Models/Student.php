<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name',
        'email',
        'whatsapp',
        'school',
        'grade',
        'address',
        'parent_name',
        'parent_phone'
    ];
}
