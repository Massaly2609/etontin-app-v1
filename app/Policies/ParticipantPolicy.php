<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class ParticipantPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, User $model): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $model): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
      /**
     * Détermine si l'utilisateur peut supprimer un autre utilisateur.
     */
    public function delete(User $authenticatedUser, User $userToDelete)
    {
        // Les SUPER_ADMIN ne peuvent pas être supprimés
        if ($userToDelete->profil === 'SUPER_ADMIN') {
            return false;
        }

        // Seuls les administrateurs ou les SUPER_ADMIN peuvent supprimer des utilisateurs
        return $authenticatedUser->profil === 'ADMIN' || $authenticatedUser->profil === 'SUPER_ADMIN';
    }
    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, User $model): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, User $model): bool
    {
        return false;
    }
}
