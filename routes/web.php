<?php

use Illuminate\Support\Facades\Route;

use App\Models\User; // Agrega esto al inicio del archivo

Route::get('/', function () {
    $users = User::get();

    return view('welcome', ['users' => $users]);
});
