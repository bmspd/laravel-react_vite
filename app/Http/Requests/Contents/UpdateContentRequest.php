<?php

namespace App\Http\Requests\Contents;

use App\Enums\CurrentContentStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class UpdateContentRequest extends FormRequest {

    public function authorize():bool {
        return true;
    }

    public function rules():array {
        return [
            'name' => 'string',
            'description' => 'string|nullable',
            'release_date' => 'date|nullable',
            'end_date' => 'data|nullable',
            'type_id' => 'integer',
            'current_status' => [new Enum(CurrentContentStatus::class)]
        ];
    }
}
