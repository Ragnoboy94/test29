<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn() => response()->json(['name' => 'test29', 'status' => 'ok']));
