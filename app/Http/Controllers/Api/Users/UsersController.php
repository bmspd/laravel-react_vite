<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function getAll():JsonResponse {
        $users = User::with('role')->paginate(15);
        return response()->json($users);
    }
}
