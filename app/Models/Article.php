<?php

namespace App\Models;

use App\Enums\Status;
use App\Traits\CommonFilters;
use App\Traits\HasStatus;
use App\Traits\InteractsWithMedia;
use App\Traits\Translatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia;

class Article extends Model implements HasMedia
{
    use HasFactory, Translatable, SoftDeletes, InteractsWithMedia, CommonFilters, HasStatus, LogsActivity;

    public $translatedAttributes = ['title', 'content', 'slug'];

    protected $fillable = ['author_id', 'section_id', 'product_id', 'bank_id', 'sort_order', 'status', 'published_at'];

    protected $casts = [
        'status' => Status::class,
        'published_at' => 'datetime',
    ];

    protected static $logOnlyDirty = true;

    protected static $logAttributes = ['author_id', 'section_id', 'product_id', 'bank_id', 'sort_order', 'status', 'published_at', 'title', 'content', 'slug'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['author_id', 'section_id', 'product_id', 'bank_id', 'sort_order', 'status', 'published_at', 'title', 'content', 'slug'])
            ->useLogName('article_log')
            ->dontSubmitEmptyLogs();
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }

    public function section(): BelongsTo
    {
        return $this->belongsTo(Section::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function bank(): BelongsTo
    {
        return $this->belongsTo(Bank::class);
    }

    public function rates()
    {
        return $this->hasMany(ArticleRate::class);
    }

    public function isDislikedBy(User $user): bool
    {
        return $this->rates()->where('user_id', $user->id)->where('action', 'dislike')->exists();
    }

    public function isLikedBy(User $user): bool
    {
        return $this->rates()->where('user_id', $user->id)->where('action', 'like')->exists();
    }

    public function publishedAt()
    {
        if ($this->published_at) {
            return $this->published_at->diffForHumans();
        }

        return $this->created_at->diffForHumans();
    }

    public function updatedAt()
    {
        return $this->updated_at->diffForHumans();
    }


    public function shortContent(): Attribute
    {
        return Attribute::make(get: fn() => Str::limit(strip_tags($this->content), 150));
    }

    public function scopeWhereCanAccess(Builder $builder): void
    {
        $builder
            ->whereActivated()
            ->where('bank_id', auth()->user()->activeBank()->id);
    }
}
