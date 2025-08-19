<?php

namespace App\Models;

use App\Enums\Status;
use App\Traits\CommonFilters;
use App\Traits\HasStatus;
use App\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ArticleNoteCategory extends Model
{
    use CommonFilters, HasStatus, Translatable;

    protected $fillable = ['bank_id', 'status'];

    public $translatedAttributes = ['title'];

    protected $casts = [
        'status' => Status::class,
    ];

    public function bank(): BelongsTo
    {
        return $this->belongsTo(Bank::class);
    }
}
