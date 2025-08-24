<?php

namespace App\Policies;

use App\Models\ArticleNoteCategory;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ArticleNoteCategoryPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if ($user->can('list-article_note_category')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ArticleNoteCategory $category): bool
    {
        return $user->can('show-article_note_category') && $user->banks()->pluck('banks.id')->contains($category->bank_id);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create-article_note_category');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ArticleNoteCategory $category): bool
    {
        return $user->can('update-article_note_category') && $user->banks()->pluck('banks.id')->contains($category->bank_id);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ArticleNoteCategory $category): bool
    {
        return $user->can('delete-article_note_category') && $user->banks()->pluck('banks.id')->contains($category->bank_id);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ArticleNoteCategory $category): bool
    {
        return $user->can('restore-article_note_category') && $user->banks()->pluck('banks.id')->contains($category->bank_id);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ArticleNoteCategory $category): bool
    {
        return $user->can('force-delete-article_note_category') && $user->banks()->pluck('banks.id')->contains($category->bank_id);
    }
}
