<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Content extends BaseContent
{
    protected $table = 'contents';

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_content', 'content_id', 'user_id');
    }
}
