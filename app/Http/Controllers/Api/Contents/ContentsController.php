<?php

namespace App\Http\Controllers\Api\Contents;

use App\Http\Controllers\Controller;
use App\Http\Requests\Contents\CreateContentRequest;
use App\Http\Requests\Contents\UpdateContentRequest;
use App\Models\Content;
use App\Models\ContentStatus;
use App\Models\ContentType;
use App\Models\Image;
use App\Models\RequestContent;
use App\Serializers\DataSerializer;
use App\Transformers\ContentTransformer;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        $contentData = $request->validated();
        $contentType = ContentType::query()->find($request->type_id);
        if (!$contentType) {
            throw ValidationException::withMessages(['type_id' => 'The type id field is invalid']);
        }
        $content = Content::query()->create($contentData);
        $image = $request->file('poster');
        if ($image) {
            $content->addPoster($image);
        }
        $data = fractal()
            ->item($content)
            ->transformWith(new ContentTransformer())
            ->serializeWith(new DataSerializer());
        return response()->json($data);
    }

    /**
     * @throws ValidationException
     */
    public function updateContentById(UpdateContentRequest $request, string $id)
    {

        $content = Content::query()->find($id);
        if (!$content) return  response()->json(["message" => "Content not found"], 404);
        $contentUpdate = $request->validated();

        if (!$content->isValidContentType($request->type_id)) {
            throw ValidationException::withMessages(['type_id' => 'The type id field is invalid']);
        }
        $image = $request->file('poster');
        if (isset($request->remove_poster) || $image) {
            $content->deletePoster();
        }
        if ($image) {
            $content->addPoster($image);
        }
        $content->update($contentUpdate);
        $data = fractal()
            ->item($content)
            ->transformWith(new ContentTransformer())
            ->serializeWith(new DataSerializer());
        return response()->json($data);
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
        $contentData = $request->validated();
        $contentType = ContentType::query()->find($request->type_id);
        if (!$contentType) {
            throw ValidationException::withMessages(['type_id' => 'The type id field is invalid']);
        }
        $reqContent = RequestContent::query()->create($contentData);
        $image = $request->file('poster');
        if ($image) {
            $reqContent->addPoster($image);
        }
        $data = fractal()
            ->item($reqContent)
            ->transformWith(new ContentTransformer())
            ->serializeWith(new DataSerializer());
        return response()->json($data);
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
        $request->deletePoster();
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
        $content = Content::query()->create($request->attributesToArray());
        $poster = $request->detachPoster();
        $content->attachPoster($poster);
        $request->delete();
        $data = fractal()
            ->item($content)
            ->transformWith(new ContentTransformer())
            ->serializeWith(new DataSerializer());
        return response()->json($data);
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
