<?php

namespace App\Models;

use App\Traits\InteractsWithMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;

class CkEditorFakeModel extends Model implements HasMedia
{
    use InteractsWithMedia;
}
