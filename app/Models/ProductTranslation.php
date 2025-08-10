<?php

namespace App\Models;

use App\Services\SlugService;
use App\Traits\HasTranslatedSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class ProductTranslation extends Model
{
    use HasFactory, HasTranslatedSlug, LogsActivity;

    public $timestamps = false;

    public $fillable = ['title', 'slug'];

    public const SLUG_SOURCE = 'title';

    protected static $logOnlyDirty = true;

    protected static $logAttributes = ['title', 'slug'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['title', 'slug'])
            ->useLogName('product_translation_log')
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }
}
