<?php

namespace App\Transformers;

use App\Models\Content;
use App\Models\RequestContent;
use League\Fractal\TransformerAbstract;

class ContentTransformer extends TransformerAbstract {
    protected array $availableIncludes = [
        'type'
    ];
    protected array $defaultIncludes = [
        'poster'
    ];
    public function transform(Content|RequestContent $content):array {
        return [
            'id' => $content->id,
            'name' => $content->name,
            'description' => $content->description,
            'release_date' => $content->release_date,
            'end_date' => $content->end_date,
            'type_id' => $content->type_id,
            'current_status' => $content->current_status,
            'poster_id' => $content->poster_id
        ];
    }
    public function includeType(Content|RequestContent $content) {
        $contentType = $content->type;
        return $this->item($contentType, new ContentTypeTransformer);
    }

    public function includePoster(Content|RequestContent $content) {
        $poster = $content->poster;
        if (!$poster) return null;
        return $this->item($poster, new ImageTransformer);
    }
}
