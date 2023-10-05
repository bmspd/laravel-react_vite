<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\Role;
use App\Models\User;
use http\Env\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\RegisterRequest;


class ApiAuthController extends Controller
{

    /**
     * @OA\Get(
     *     path="/sanctum/csrf-cookie",
     *     @OA\Response(
     *     response="204",
     *     description="Request to take cookie",
     *     @OA\JsonContent(),
     *     @OA\Header(header="Set-Cookie", @OA\Schema(type="string"))
     *     ))
     *
     */
    public function cookiesCheck() {

    }

    public function register(RegisterRequest $request): JsonResponse {
        $data = $request->validated();
        $user = User::query()->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        $role = Role::query()->first();
        $user->role()->associate($role);
        $user->save();
        return response()->json([
            'message' => 'User created'
        ]);
    }
    /**
     * @OA\Post(
     *     path="/api/auth/login",
     *
     *     @OA\Parameter(in="cookie", name="X-XSRF-TOKEN"),
     *     @OA\RequestBody( @OA\JsonContent(example=
     *     {"name":"asd", "password": "asd"})),
     *     @OA\Response(
     *     response="200",
     *     description="Request to take cookie",
     *     @OA\JsonContent(),
     *     ))
     *
     */
    public function login(Request $request):JsonResponse {
        $creds = $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($creds)) {
            $request->session()->regenerate();
            $user = User::with('role')->where('id', $request->user()->id)->first();
            return response()->json($user);
        }
        return response()->json(['credentials' => 'wrong creds'], 403);
    }
    public function whoAmI(Request $request):JsonResponse {
        $user = User::with('role')->where('id', $request->user()->id)->first();
        return response()->json($user);
    }
    public function logout():JsonResponse {
        Auth::guard('web')->logout();
        return response()->json(null, 204);
    }

    /**
     * @OA\Get(
     *     path="/api/user",
     *     @OA\Parameter(in="cookie", name="X-XSRF-TOKEN"),
     *     @OA\Response(response="200",
     *     description="An example endpoint",
     *     @OA\JsonContent()
     *     )
     * )
     */
    public function getUserInfo(Request $request):JsonResponse {
        return response()->json( $request->user());
    }
}
