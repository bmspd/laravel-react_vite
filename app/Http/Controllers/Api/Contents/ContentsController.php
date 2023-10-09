<?php

namespace App\Http\Controllers\Api\Contents;

use App\Enums\CurrentContentStatus;
use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\ContentType;
use App\Models\RequestContent;
use App\Serializers\DataSerializer;
use App\Transformers\ContentTransformer;
use Illuminate\Http\Client\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Validation\ValidationException;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class ContentsController extends Controller
{
    public function getContents(Request $request): JsonResponse
    {
        $perPage = $request->query('per_page') ?? config('defaults.pagination.per_page');
        $contents = Content::query()->paginate($perPage);
        $includes = $request->include ?? [];
        $data = fractal()
            ->collection($contents)
            ->transformWith(new ContentTransformer())
            ->paginateWith(new IlluminatePaginatorAdapter($contents))
            ->parseIncludes($includes)
            ->serializeWith(new DataSerializer());
        return response()->json($data);
    }

    /**
     * @throws ValidationException
     */
    public function requestContent(Request $request): JsonResponse
    {
        $content = $request->validate([
            'name' => 'required',
            'description' => 'string|nullable',
            'release_date' => 'date|nullable',
            'end_date' => 'data|nullable',
            'type_id' => 'integer|required',
            'current_status' => [new Enum(CurrentContentStatus::class), 'required']
        ]);
        $contentType = ContentType::query()->find($request->type_id);
        if (!$contentType) {
            throw ValidationException::withMessages(['type_id' => 'The type id field is invalid']);
        }
        RequestContent::query()->create($content);
        return response()->json(["message" => 'Request successfully made']);
    }

    /**
     * @throws ValidationException
     */
    public function cancelRequestContent(string $id): JsonResponse {
        $request = RequestContent::query()->find($id);
        if (!$request) {
            throw ValidationException::withMessages(['request' => 'Invalid request id was given']);
        }
        $request->delete();
        return response()->json(["message" => "Request was canceled"]);
    }

    /**
     * @throws ValidationException
     */
    public function approveRequestContent(string $id):JsonResponse {
        $request = RequestContent::query()->find($id);
        if (!$request) {
            throw ValidationException::withMessages(['request' => 'Invalid request id was given']);
        }
        Content::query()->create($request->attributesToArray());
        $request->delete();
        return response()->json(["message" => "Request was approved and added to contents list"]);
    }
}
