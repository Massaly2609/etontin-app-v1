<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cotisation extends Model
{
    protected $fillable = [
        'idUser', 'idTontine', 'montant', 'moyen_paiement',   'date_cotisation'
    ];

    protected $casts = [
        'date_cotisation' => 'date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'idUser');
    }

    public function tontine()
    {
        return $this->belongsTo(Tontine::class, 'idTontine');
    }

}
