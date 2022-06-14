<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return inertia('Home');
});

Route::get('/users', function () {
    return inertia('Users', [
        // using `map` here would return a new Array instead of Collection
        // which means we wont have access to Links property that is neccessary for Pagination
        // instead, we can use `through` to keep the same Collection and manipulate only the users.data Array
        'users' => User::paginate(10)->through(fn($user) => [
            'id' => $user->id,
            'name' => $user->name
        ])
    ]);
});

Route::get('/settings', function () {
    return inertia('Settings');
});

Route::post('/logout', function () {
    dd('logging the user out');
});
