<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'idTontine', 'nomImage',
    ];

    // Relation avec le modèle Tontine
    public function tontine()
    {
        return $this->belongsTo(Tontine::class, 'idTontine');
    }
}
