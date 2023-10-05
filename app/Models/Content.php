<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Content extends Model
{
    use HasFactory;

    protected $table = 'contents';
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
    public function users():BelongsToMany {
        return $this->belongsToMany(User::class, 'user_content', 'content_id', 'user_id');
    }
}
