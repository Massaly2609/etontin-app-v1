<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tirage extends Model
{
    protected $fillable = [
        'idUser', 'idTontine',
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
