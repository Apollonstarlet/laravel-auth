<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotes extends Model
{
    use HasFactory;

    protected $fillable = [
        'rfno',
        'multi',
        'cdes',
        'cmak',
        'cran',
        'cyer',
        'cbdy',
        'cbdt',
        'cgbx',
        'cfue',
        'cvin',
        'cenn',
        'cccs',
        'cclr',
        'creg',
        'unam',
        'uloc',
        'upos',
        'uphn',
        'umob',
        'ueml'
    ];
}
