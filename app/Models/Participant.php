<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $fillable = [
        'idUser', 'dateNaissance', 'cni', 'adresse', 'imageCni',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'idUser');
    }
 // Relation Many-to-Many avec Tontine
    public function tontine()
    {
        return $this->belongsTo(Tontine::class, 'idTontine');
    }

}
