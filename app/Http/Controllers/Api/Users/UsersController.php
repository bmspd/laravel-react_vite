<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Transformers\UserTransformer;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class UsersController extends Controller
{
    public function getAll(Request $request):JsonResponse {
        $perPage = $request->query('per_page') ?? config('defaults.pagination.per_page');
        $users = User::query()->paginate($perPage);
        $includes = $request->include ?? [];
        $data = fractal()
            ->collection($users)
            ->transformWith(new UserTransformer())
            ->paginateWith(new IlluminatePaginatorAdapter($users))
            ->parseIncludes($includes);
        return response()->json($data);
    }
    public function getById(Request $request, string $userId):JsonResponse {
        $user = User::with(['role', 'contents'])->where('id', $userId)->first();
        if (!$user) return response()->json(['message' => 'User not found'], 404);
        $includes = $request->include ?? [];
        $data = fractal()
            ->item($user)
            ->transformWith(new UserTransformer())
            ->parseIncludes($includes);
        return response()->json($data);
    }
}
