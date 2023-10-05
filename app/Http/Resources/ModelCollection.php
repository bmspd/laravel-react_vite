<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ModelCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }
    public function with(Request $request): array
    {
        return [
            'meta' => [
                'metaKey' => 'metaValue'
            ],
        ];
    }

    public function paginationInformation(Request $request, $paginated, array $default):array
    {
        return ['meta' => ['pagination'=> $paginated]];
    }
}
