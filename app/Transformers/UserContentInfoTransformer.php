<?php

namespace App\Transformers;

use App\Models\UserContent;
use League\Fractal\TransformerAbstract;

class UserContentInfoTransformer extends TransformerAbstract {

    protected array $defaultIncludes = [
        'status'
    ];
    public function transform($info):array {
        return [
            'rating' => $info->rating,
            'status_id' => $info->status_id
        ];
    }
    public function includeStatus(UserContent $content) {
        $status = $content->status;
        if (!$status) return null;
        return $this->item($status, new UserContentStatusTransformer);
    }
}
