<?php

namespace App\Models;

use App\Traits\HasTranslatedSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class ArticleTranslation extends Model
{
    use HasFactory, HasTranslatedSlug, LogsActivity;

    public $timestamps = false;

    public $fillable = ['title', 'content', 'slug'];

    public const SLUG_SOURCE = 'title';

    protected static $logOnlyDirty = true;

    protected static $logAttributes = ['title', 'content', 'slug'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['title', 'content', 'slug'])
            ->useLogName('article_translation_log')
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }
}
