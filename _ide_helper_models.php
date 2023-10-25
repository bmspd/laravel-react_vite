<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\BaseContent
 *
 * @property-read \App\Models\Image|null $poster
 * @property-read \App\Models\ContentType|null $type
 * @method static \Illuminate\Database\Eloquent\Builder|BaseContent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseContent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseContent query()
 * @mixin \Eloquent
 */
	class IdeHelperBaseContent {}
}

namespace App\Models{
/**
 * App\Models\Content
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $release_date
 * @property \Illuminate\Support\Carbon|null $end_date
 * @property int $type_id
 * @property string|null $current_status
 * @property int|null $poster_id
 * @property-read \App\Models\Image|null $poster
 * @property-read \App\Models\ContentType $type
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Database\Factories\ContentFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Content newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Content newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Content query()
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereCurrentStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content wherePosterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereReleaseDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content withUserInfo(\App\Models\User $user)
 * @mixin \Eloquent
 */
	class IdeHelperContent {}
}

namespace App\Models{
/**
 * App\Models\ContentStatus
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ContentType> $contentTypes
 * @property-read int|null $content_types_count
 * @method static \Database\Factories\ContentStatusFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|ContentStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ContentStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ContentStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|ContentStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContentStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContentStatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContentStatus whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperContentStatus {}
}

namespace App\Models{
/**
 * App\Models\ContentType
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property string $action
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ContentStatus> $contentStatuses
 * @property-read int|null $content_statuses_count
 * @method static \Database\Factories\ContentTypeFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|ContentType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ContentType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ContentType query()
 * @method static \Illuminate\Database\Eloquent\Builder|ContentType whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContentType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContentType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContentType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContentType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperContentType {}
}

namespace App\Models{
/**
 * App\Models\Image
 *
 * @property int $id
 * @property string|null $original_name
 * @property string|null $mime_type
 * @property string $path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Content|null $content
 * @method static \Illuminate\Database\Eloquent\Builder|Image newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Image newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Image query()
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereMimeType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereOriginalName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperImage {}
}

namespace App\Models{
/**
 * App\Models\RequestContent
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $release_date
 * @property \Illuminate\Support\Carbon|null $end_date
 * @property int $type_id
 * @property string|null $current_status
 * @property int|null $poster_id
 * @property-read \App\Models\Image|null $poster
 * @property-read \App\Models\ContentType $type
 * @method static \Illuminate\Database\Eloquent\Builder|RequestContent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RequestContent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RequestContent query()
 * @method static \Illuminate\Database\Eloquent\Builder|RequestContent whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestContent whereCurrentStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestContent whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestContent whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestContent whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestContent whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestContent wherePosterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestContent whereReleaseDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestContent whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestContent whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperRequestContent {}
}

namespace App\Models{
/**
 * App\Models\Role
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Database\Factories\RoleFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperRole {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $role_id
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Content> $contents
 * @property-read int|null $contents_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\Role|null $role
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperUser {}
}

namespace App\Models{
/**
 * App\Models\UserContent
 *
 * @property int $user_id
 * @property int $content_id
 * @property int $id
 * @property int|null $status_id
 * @property int|null $rating
 * @property-read \App\Models\ContentStatus|null $status
 * @method static \Illuminate\Database\Eloquent\Builder|UserContent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserContent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserContent query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserContent whereContentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserContent whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserContent whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserContent whereStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserContent whereUserId($value)
 * @mixin \Eloquent
 */
	class IdeHelperUserContent {}
}

