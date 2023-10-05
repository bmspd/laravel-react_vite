<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ContentStatus extends Model
{
    use HasFactory;

    protected $table = 'content_statuses';
    protected $fillable = [
      "name"
    ];

    public function contentTypes():BelongsToMany {
      return $this->belongsToMany(ContentType::class);
    }
}
