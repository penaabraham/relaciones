<?php

use Illuminate\Support\Facades\Route;
use App\Models\User; // Asegúrate de tener este namespace correcto

Route::get('/', function () {
    $users = User::get();
    return view('welcome', ['users' => $users]);
});

Route::get('/profile/{id}', function ($id) {
    $user = User::find($id);

    if (!$user) {
        abort(404); // Muestra un error 404 si el usuario no existe
    }

    return view('profile', ['user' => $user]); // Usa array asociativo para pasar datos
})->name('profile');
