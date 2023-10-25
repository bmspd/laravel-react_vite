<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\JoinClause;

/**
 * @mixin IdeHelperContent
 */
class Content extends BaseContent
{
    protected $table = 'contents';

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_content', 'content_id', 'user_id')
            ->withPivot(['status_id', 'rating']);
    }
    public function scopeWithUserInfo(Builder $query, User $user):void {
        $userContents = UserContent::query()
            ->where('user_id', '=', $user->id)
            ->select(['content_id', 'id as user_content_id']);
        $query->leftJoinSub($userContents, 'user_content', function (JoinClause $join) {
            $join->on('contents.id', '=', 'user_content.content_id');
        });
    }
}
