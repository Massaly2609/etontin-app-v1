<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    //
    protected $fillable = [
        'key',       // Ajoutez cette ligne
        'value',     // Assurez-vous que cette colonne est également incluse
        'description', // Si vous utilisez cette colonne
    ];
}
