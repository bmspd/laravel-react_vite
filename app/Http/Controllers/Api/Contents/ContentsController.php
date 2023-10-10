<?php

namespace App\Http\Controllers\Api\Contents;

use App\Http\Controllers\Controller;
use App\Http\Requests\Contents\CreateContentRequest;
use App\Http\Requests\Contents\UpdateContentRequest;
use App\Models\Content;
use App\Models\ContentStatus;
use App\Models\ContentType;
use App\Models\RequestContent;
use App\Serializers\DataSerializer;
use App\Transformers\ContentTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
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

    public function getContentById(Request $request, string $id): JsonResponse
    {
        $content = Content::query()->find($id);
        if (!$content) {
            return response()->json(["message" => 'Content not found'], 404);
        }
        $includes = $request->include ?? [];
        $data = fractal()
            ->item($content)
            ->transformWith(new ContentTransformer())
            ->parseIncludes($includes)
            ->serializeWith(new DataSerializer());
        return response()->json($data);
    }

    public function createContent(CreateContentRequest $request):JsonResponse
    {
        $content = $request->validated();
        $contentType = ContentType::query()->find($request->type_id);
        if (!$contentType) {
            throw ValidationException::withMessages(['type_id' => 'The type id field is invalid']);
        }
        Content::query()->create($content);
        return response()->json(["message" => "Content successfully created"]);
    }
    public function updateContentById(UpdateContentRequest $request, string $id):JsonResponse
    {
        $content = Content::query()->find($id);
        if (!$content) return  response()->json(["message" => "Content not found"], 404);
        $contentUpdate = $request->validated();
        $contentType = ContentType::query()->find($request->type_id);
        if (!$contentType && $request->type_id) {
            throw ValidationException::withMessages(['type_id' => 'The type id field is invalid']);
        }
        $content->update($contentUpdate);
        return response()->json(["message" => "Content was updated"]);
    }
    public function deleteContentById(string $id):JsonResponse
    {
        $content = Content::query()->find($id);
        if (!$content) return response()->json(["message" => "Content not found"], 404);
        $content->delete();
        return response()->json(["message" => "Content successfully was deleted"]);
    }

    /**
     * @throws ValidationException
     */
    public function requestContent(CreateContentRequest $request): JsonResponse
    {
        $content = $request->validated();
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
    public function cancelRequestContent(string $id): JsonResponse
    {
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
    public function approveRequestContent(string $id): JsonResponse
    {
        $request = RequestContent::query()->find($id);
        if (!$request) {
            throw ValidationException::withMessages(['request' => 'Invalid request id was given']);
        }
        Content::query()->create($request->attributesToArray());
        $request->delete();
        return response()->json(["message" => "Request was approved and added to contents list"]);
    }

    /**
     * @throws ValidationException
     */
    public function changeUserContentStatus(Request $request, $id):JsonResponse
    {
        if (!Content::query()->find($id)) {
            return response()->json(["message" => "Content not found"], 404);
        }
        if (!ContentStatus::query()->find($request->status_id) && $request->status_id) {
            throw ValidationException::withMessages(['status_id' => 'Invalid status id']);
        }
        $request
            ->user()
            ->contents()
            ->syncWithoutDetaching([$id => ['status_id' => $request->status_id]]);
        return response()->json(["message" => 'Successful operation with content']);
    }

    public function removeContentFromUserList(Request $request, string $id)
    {
        $request->user()->contents()->detach([$id]);
        return response()->json(["message" => "Content was removed from your list"]);
    }
}
