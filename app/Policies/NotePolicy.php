<?php

namespace App\Policies;

use App\Models\Note;
use App\Models\User;

class NotePolicy
{
    /**
     * Prevent viewing the list of all notes globally.
     */
    public function viewAny(User $user): bool
    {
        return false; // Or set to true if using pagination for own notes only
    }

    /**
     * Allow viewing a specific note only if it belongs to the user.
     */
    public function view(User $user, Note $note): bool
    {
        return $user->id === $note->user_id;
    }

    /**
     * Allow creation if needed (you currently block it).
     */
    public function create(User $user): bool
    {
        return true; // change to `true` if users should be able to create notes
    }

    /**
     * Allow update only if note belongs to user.
     */
    public function update(User $user, Note $note): bool
    {
        return $user->id === $note->user_id;
    }

    /**
     * Allow delete only if note belongs to user.
     */
    public function delete(User $user, Note $note): bool
    {
        return $user->id === $note->user_id;
    }

    /**
     * Prevent restoring notes by default.
     */
    public function restore(User $user, Note $note): bool
    {
        return false;
    }

    /**
     * Prevent force deleting notes by default.
     */
    public function forceDelete(User $user, Note $note): bool
    {
        return false;
    }
}
