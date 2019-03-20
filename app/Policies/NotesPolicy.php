<?php

namespace App\Policies;

use App\User;
use App\Models\Notes;
use Illuminate\Auth\Access\HandlesAuthorization;

/**
 * Class NotesPolicy 
 * 
 * @package App\Policies
 */
class NotesPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the notes. 
     * 
     * @param  User  $user  Database entity from the authenticated user. 
     * @param  Notes $notes Database entity from the given note. 
     * @return bool
     */
    public function update(User $user, Notes $notes): bool 
    {
        return $user->id === $notes->author_id;
    }

    /**
     * Determine whether the user can delete the notes.
     *
     * @param  User  $user  Database entity from the authenticated user. 
     * @param  Notes $notes Database entity from the given note. 
     * @return bool
     */
    public function delete(User $user, Notes $notes): bool
    {
        return $user->id === $notes->author_id;
    }
}
