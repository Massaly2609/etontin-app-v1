<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Tontine;
use Illuminate\Auth\Access\Response;

class TontinePolicy
{
    public function view(User $user, Tontine $tontine)
    {
        return $tontine->participants()->where('idUser', $user->id)->exists();
    }

    public function join(User $user, Tontine $tontine)
    {
        return !$user->currentTontine() && $tontine->dateFin > now();
    }

    public function leave(User $user, Tontine $tontine)
    {
        return $tontine->participants()->where('idUser', $user->id)->exists();
    }

    public function createCotisation(User $user, Tontine $tontine)
    {
        return $tontine->participants()->where('idUser', $user->id)->exists();
    }
}
