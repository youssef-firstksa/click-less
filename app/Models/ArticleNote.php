<?php

namespace App\Models;

use App\Traits\CommonFilters;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Testing\Fluent\Concerns\Has;

class ArticleNote extends Model
{
    use HasFactory, CommonFilters;

    protected $fillable = ['title', 'content', 'status', 'article_note_category_id', 'user_id', 'article_id', 'bank_id'];

    public const STATUS = [
        'sent',
        'under_review',
        'closed',
    ];

    public static function statuses()
    {
        return collect(self::STATUS)->mapWithKeys(
            fn($status) =>
            [$status => __('dashboard.article_notes_management.status.' . $status)]
        );
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(ArticleNoteCategory::class, 'article_note_category_id', 'id');
    }

    public function bank(): BelongsTo
    {
        return $this->belongsTo(Bank::class);
    }

    public function scopeWhereCanAccessDashboard(Builder $builder): void
    {
        $builder
            // ->whereActivated()
            ->when(
                auth()->user()->role->name !== 'super-admin',
                function (Builder $builder) {
                    $builder->whereIn('bank_id', auth()->user()->banks()->pluck('banks.id')->toArray());
                }
            );
    }
}
