<?php

namespace App\Transformers;

use App\Models\Content;
use App\Models\ContentType;
use App\Models\Image;
use League\Fractal\TransformerAbstract;

class ImageTransformer extends TransformerAbstract {

    public function transform(Image $image):array {
        return [
            'id' => $image->id,
            'original_name' => $image->original_name,
            'mime_type' => $image->mime_type,
            'path' => $image->path
        ];
    }
}
