<?php

namespace App\Models;

use App\Enums\NotificationType;
use App\Enums\NotificationView;
use App\Enums\Status;
use App\Traits\CommonFilters;
use App\Traits\HasStatus;
use App\Traits\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class SystemNotification extends Model
{
    use HasFactory, Translatable, SoftDeletes, CommonFilters, HasStatus, LogsActivity;

    public $translatedAttributes = ['title', 'description', 'slug'];

    protected $fillable = [
        'bank_id',
        'sort_order',
        'status',
        'notification_type',
        'notification_view',
        'publish_start_at',
        'publish_end_at'
    ];

    protected $casts = [
        'status' => Status::class,
        'publish_start_at' => 'datetime',
        'publish_end_at' => 'datetime',
        'notification_type' => NotificationType::class,
        'notification_view' => NotificationView::class,
    ];

    protected static $logOnlyDirty = true;


    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['bank_id', 'sort_order', 'status', 'title', 'description', 'slug', 'notification_type', 'notification_view', 'puplish_start_at', 'puplish_end_at'])
            ->useLogName('notification_log')
            ->dontSubmitEmptyLogs();
    }

    public function bank(): BelongsTo
    {
        return $this->belongsTo(Bank::class);
    }
}
