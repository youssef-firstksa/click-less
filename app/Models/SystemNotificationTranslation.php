<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasTranslatedSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class SystemNotificationTranslation extends Model
{
    use HasFactory, HasTranslatedSlug, LogsActivity;

    public $timestamps = false;

    public $fillable = ['title', 'description', 'slug'];

    public const SLUG_SOURCE = 'title';

    protected static $logOnlyDirty = true;

    protected static $logAttributes = ['title', 'description', 'slug'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['title', 'description', 'slug'])
            ->useLogName('notification_translation_log')
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }
}
