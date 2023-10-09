<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RequestContent extends Model
{
    use HasFactory;

    protected $table = 'request_contents';

    protected $fillable = [
        'name',
        'description',
        'release_date',
        'end_date',
        'type_id',
        'current_status',
    ];
    protected $casts = [
        'release_date' => 'datetime',
        'end_date' => 'datetime'
    ];

    public function type(): BelongsTo {
        return $this->belongsTo(ContentType::class);
    }
}
