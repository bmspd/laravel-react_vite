<?php

namespace App\Transformers;

use App\Models\ContentStatus;
use League\Fractal\TransformerAbstract;

class UserContentStatusTransformer extends TransformerAbstract {

    public function transform(ContentStatus $status): array {
        return [
            'id' => $status->id,
            'name' => $status->name,
        ];
    }
}
