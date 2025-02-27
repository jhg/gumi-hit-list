<?php

namespace App\Policies;

use App\Models\HitReservation;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class HitReservationPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, HitReservation $hitReservation): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return !$user->hitReservation()->exists();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, HitReservation $hitReservation): bool
    {
        return $user->id === $hitReservation->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, HitReservation $hitReservation): bool
    {
        return $user->id === $hitReservation->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, HitReservation $hitReservation): bool
    {
        return $user->id === $hitReservation->user_id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, HitReservation $hitReservation): bool
    {
        return $user->id === $hitReservation->user_id;
    }
}
