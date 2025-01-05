<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PokemonCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'cardname',
        'img',
        'serial', 
        'yea', 
        'lan',
        'variant',
        'front',
        'sidescorners',
        'back',
        'centring',
        'overall'
    ];
}
