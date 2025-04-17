<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tontine extends Model
{
    protected $fillable = [
        'frequence', 'libelle', 'dateDebut', 'dateFin', 'description', 'montant_total', 'montant_de_base', 'nbreParticipant','gerant_id'
    ];
    protected $casts = [
        'dateDebut' => 'date:Y-m-d',
        'dateFin' => 'date:Y-m-d',
    ];

    // Si besoin de formater différemment
    protected $dateFormat = 'Y-m-d';

    // Relation avec le gérant
    public function gerant()
    {
        return $this->belongsTo(User::class, 'gerant_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relation avec les participants
    public function participants()
    {
        return $this->belongsToMany(User::class, 'participants', 'idTontine', 'idUser')
                   ->withTimestamps();
    }

    // Relation avec le modèle Cotisation
    public function cotisations()
    {
        return $this->hasMany(Cotisation::class, 'idTontine');
    }


    public function tirages()
    {
        return $this->hasMany(Tirage::class, 'idTontine');
    }

    // Relation avec le modèle Image
    public function images()
    {
        return $this->hasMany(Image::class, 'idTontine');
    }


    // Accessor pour le statut du gerant
    public function getStatutAttribute()
    {
        return $this->dateFin > now() ? 'Active' : 'Terminée';
    }

    //Des methode pour calculer le montant restant et le pourcentage de completion
    public function montantRestant()
    {
        return $this->montant_total - $this->cotisations()->sum('montant');
    }

    public function pourcentageCompletion()
    {
        return ($this->cotisations()->sum('montant') / $this->montant_total) * 100;
    }

    public function prochainTirage()
    {
        return $this->tirages()
                ->where('created_at', '>', now())
                ->orderBy('created_at')
                ->first();
    }

    public function scopeActive($query)
    {
        return $query->where('dateFin', '>', now());
    }

    public function scopeAvailableForUser($query, $userId)
    {
        return $query->active()
            ->whereDoesntHave('participants', function($q) use ($userId) {
                $q->where('idUser', $userId);
            });
    }

    public function scopeForGerant($query, $gerantId)
    {
        return $query->where('gerant_id', $gerantId);
    }

    public function scopeLatestActive($query, $limit = 5)
    {
        return $query->orderBy('created_at', 'desc')
                    ->withCount('participants')
                    ->take($limit);
        }
    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    public function prochaineEcheance()
    {
        // Exemple de logique - à adapter selon votre business logic
        if ($this->frequence === 'mensuelle') {
            return now()->addMonth()->startOfMonth();
        } elseif ($this->frequence === 'hebdomadaire') {
            return now()->addWeek()->startOfWeek();
        } elseif ($this->frequence === 'quotidienne') {
            return now()->addDay();
        }

        return now()->addMonth(); // Valeur par défaut
    }
// Dans app/Models/Tontine.php

    // public function getParticipantsEligiblesAttribute()
    // {
    //     // Participants qui ont cotisé le montant total requis et n'ont pas encore gagné
    //     return $this->participants()
    //         ->whereDoesntHave('tirages', function($q) {
    //             $q->where('idTontine', $this->id);
    //         })
    //         ->whereHas('cotisations', function($q) {
    //             $q->selectRaw('idUser, sum(montant) as total')
    //             ->groupBy('idUser')
    //             ->havingRaw('sum(montant) >= ?', [$this->montant_total]);
    //         })
    //         ->get();
    // }

    public function getParticipantsEligiblesAttribute()
    {
        return $this->participants()
            ->whereDoesntHave('tirages', function($q) {
                $q->where('idTontine', $this->id);
            })
            ->whereHas('cotisations', function($q) {
                $q->selectRaw('idUser, sum(montant) as total')
                ->groupBy('idUser')
                ->havingRaw('sum(montant) >= ?', [$this->montant_total]);
            })
            ->get();
    }

    public function prochainTiragePossible()
    {
        // Debug: Vérifiez le nombre de participants éligibles
        logger($this->participantsEligibles->count());

        return $this->participantsEligibles->count() >= 1;
    }

    // public function prochainTiragePossible()
    // {
    //     // Vérifie si on a assez de participants éligibles
    //     return $this->participantsEligibles->count() >= 1;
    //     // return $this->nbreParticipant->count() >= 1;
    // }
}
