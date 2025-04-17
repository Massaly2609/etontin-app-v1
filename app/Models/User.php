<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'prenom', 'nom', 'telephone', 'email', 'password', 'profil',
    ];

    public function hasProfil($profil)
    {
        return $this->profil === $profil;
    }

       public function cotisations()
    {
        return $this->hasMany(Cotisation::class, 'idUser');
    }
   // Relation avec les tirages


    public function tirages()
    {
        return $this->hasMany(Tirage::class, 'idUser');
    }

    public function participant()
    {
        return $this->hasOne(Participant::class, 'idUser');
    }
    public function participants()
    {
        return $this->hasMany(Participant::class, 'idUser');
    }
    public function tontines()
    {
        return $this->belongsToMany(Tontine::class, 'cotisations', 'idUser', 'idTontine');
    }




    // app/Models/User.php
    public function scopeGerants($query) {
        return $query->where('profil', 'GERANT');
    }

    public function tontinesGerees() {
        return $this->hasMany(Tontine::class, 'gerant_id'); // Ajouter gerant_id dans la migration tontines
    }

    public function scopeFilterByTontine($query, $tontineId)
    {
        return $query->when($tontineId, function($q) use ($tontineId) {
            $q->whereHas('tontines', fn($q) => $q->where('id', $tontineId));
        });
    }

public function scopeFilterByStatus($query, $status)
{
    return $query->when($status, function($q) use ($status) {
        $q->whereHas('tontines', fn($q) => $q->wherePivot('statut', $status));
    });
}

// ------- ROLE DES UTILISATEURS -------

    public function isSuperAdmin()
    {
        return $this->profil === 'SUPER_ADMIN';
    }

    public function isGerant()
    {
        return $this->profil === 'GERANT';
    }

    public function isParticipant()
    {
        return $this->profil === 'PARTICIPANT';
    }

    public function currentTontine()
    {
        return $this->tontines()
            ->active()
            ->first();
    }

    public function cotisationsForTontine($tontineId)
    {
        return $this->cotisations()
            ->where('idTontine', $tontineId)
            ->orderBy('created_at', 'desc');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
