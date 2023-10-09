<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Query\Builder;

class ContentType extends Model
{
    use HasFactory;

    protected $table='content_types';

    protected $fillable = [
        "name",
        "action"
    ];

    public function contentStatuses():BelongsToMany {
        return $this->belongsToMany(ContentStatus::class);
    }
}
