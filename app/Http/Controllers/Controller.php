<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
/**
 * @OA\Info(
 *     title="Laravel project api",
 *     version="0.1",
 *     description="php artisan l5-swagger:generate -> command to generate new doc")
 */
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
