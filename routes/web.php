<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/')->group(function() {
    include "aktor/user.php";
});

Route::prefix('backend')->group(function() {
    include "aktor/admin.php";
});
