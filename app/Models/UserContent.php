<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class UserContent extends Pivot {
    public $incrementing = true;

    public function status():BelongsTo {
        return $this->belongsTo(ContentStatus::class, 'status_id');
    }
}
