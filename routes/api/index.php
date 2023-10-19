<?php

use Illuminate\Support\Facades\Route;

Route::group([], function() {
    require 'auth.php';
    require 'contents.php';
    require 'users.php';
});
