<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;


/**
 * @mixin IdeHelperRequestContent
 */
class RequestContent extends BaseContent
{
    protected $table = 'request_contents';
}
