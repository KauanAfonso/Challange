<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return Response()->json(["msg"=>"Hello world"]);
});


