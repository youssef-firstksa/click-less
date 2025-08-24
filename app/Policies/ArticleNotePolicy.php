<?php

namespace App\Policies;

use App\Models\ArticleNote;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ArticleNotePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if ($user->can('list-article_note')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ArticleNote $note): bool
    {
        return $user->can('show-article_note') && $user->banks()->pluck('banks.id')->contains($note->bank_id);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create-article_note');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ArticleNote $note): bool
    {
        return $user->can('update-article_note') && $user->banks()->pluck('banks.id')->contains($note->bank_id);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ArticleNote $note): bool
    {
        return $user->can('delete-article_note') && $user->banks()->pluck('banks.id')->contains($note->bank_id);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ArticleNote $note): bool
    {
        return $user->can('restore-article_note') && $user->banks()->pluck('banks.id')->contains($note->bank_id);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ArticleNote $note): bool
    {
        return $user->can('force-delete-article_note') && $user->banks()->pluck('banks.id')->contains($note->bank_id);
    }
}
