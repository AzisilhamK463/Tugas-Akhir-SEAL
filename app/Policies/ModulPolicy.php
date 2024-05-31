<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Modul;
// use Illuminate\Auth\Access\Response;

class ModulPolicy
{
    /**
     * Create a new policy instance.
     */
    public function update(User $user, Modul $modul):bool
    {
        return $this->update($user, $modul);
    }

    // Return 404 Page
    // public function update(User $user, Modul $modul): Response
    // {
    //     return $user->id === $modul->user_id ? Response::allow() : Response::denyAsNotFound('You do not own this modul.');
    // }
}
