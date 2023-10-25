<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


/**
 * @mixin IdeHelperBaseContent
 */
class BaseContent extends Model
{
    use HasFactory;

    protected  $fillable = [
        'name',
        'description',
        'release_date',
        'end_date',
        'type_id',
        'current_status',
        'poster_id'
    ];
    protected $casts = [
        'release_date' => 'datetime',
        'end_date' => 'datetime'
    ];

    public function type(): BelongsTo {
        return $this->belongsTo(ContentType::class);
    }
    public function poster(): BelongsTo {
        return $this->belongsTo(Image::class);
    }
    public function deletePoster(): void {
        $poster = $this->poster;
        if (!$poster) return;
        $this->poster()->dissociate()->save();
        $poster->fullDelete();
    }
    public function detachPoster(): Image|null {
        $poster = $this->poster;
        if (!$poster) return null;
        $this->poster()->dissociate()->save();
        return $poster;
    }
    public function attachPoster(Image $poster): void {
        if ($this->poster) $this->poster()->dissociate();
        $this->poster()->associate($poster)->save();
    }
    public function addPoster($image): void {
        $path = $image->store('public');
        $poster = Image::query()->create([
            'original_name' => $image->getClientOriginalName(),
            'mime_type' => $image->getMimeType(),
            'path' => $path
        ]);
        $this->poster()->associate($poster)->save();
    }
    public function isValidContentType($reqTypeId):bool {
        $contentType = ContentType::query()->find($reqTypeId);
        if (!$contentType && !$reqTypeId) return false;
        return true;
    }
}
