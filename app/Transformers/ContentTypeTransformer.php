<?php

namespace App\Transformers;

use App\Models\Content;
use App\Models\ContentType;
use League\Fractal\TransformerAbstract;

class ContentTypeTransformer extends TransformerAbstract {

    public function transform(ContentType $contentType):array {
        return [
            'id' => $contentType->id,
            'name' => $contentType->name,
            'action' => $contentType->action,
        ];
    }
}
