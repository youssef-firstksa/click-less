<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ArticleNote extends Model
{
    protected $fillable = ['title', 'content', 'article_note_category_id', 'user_id', 'article_id', 'bank_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class);
    }

    public function articleNoteCategory(): BelongsTo
    {
        return $this->belongsTo(ArticleNoteCategory::class);
    }

    public function bank(): BelongsTo
    {
        return $this->belongsTo(Bank::class);
    }
}
