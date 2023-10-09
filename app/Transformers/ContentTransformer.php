<?php

namespace App\Transformers;

use App\Models\Content;
use League\Fractal\TransformerAbstract;

class ContentTransformer extends TransformerAbstract {
    protected array $availableIncludes = [
        'type'
    ];
    public function transform(Content $content):array {
        return [
            'id' => $content->id,
            'name' => $content->name,
            'description' => $content->description,
            'release_date' => $content->release_date,
            'end_date' => $content->end_date,
            'type_id' => $content->type_id,
            'current_status' => $content->current_status,
        ];
    }
    public function includeType(Content $content) {
        $contentType = $content->type;
        return $this->item($contentType, new ContentTypeTransformer);

    }
}
