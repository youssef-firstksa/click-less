<?php

namespace App\Models;

use App\Enums\Status;
use App\Traits\CommonFilters;
use App\Traits\HasStatus;
use App\Traits\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Article extends Model
{
    use HasFactory, Translatable, SoftDeletes, CommonFilters, HasStatus, LogsActivity;

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

    public function publishedAt()
    {
        if ($this->published_at) {
            return $this->published_at->format('Y-m-d');
        }

        return $this->created_at->format('Y-m-d');
    }
}
