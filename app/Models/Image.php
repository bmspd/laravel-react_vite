<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;

    protected $table = 'images';
    protected $fillable = [
        'original_name',
        'mime_type',
        'path'
    ];

    // есть ощущение, что здесь по логике не hasOne должен быть, но по-другому я не могу получить content
    public function content(): HasOne {
        return $this->hasOne(Content::class, 'poster_id');
    }

    public function fullDelete():void {
        $image = Image::query()->find($this->id);
        Storage::delete($image->path);
        $image->delete();
    }
}
