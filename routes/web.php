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
    return inertia('Users/Index', [
        // using `map` here would return a new Array instead of Collection
        // which means we wont have access to Links property that is neccessary for Pagination
        // instead, we can use `through` to keep the same Collection and manipulate only the users.data Array
        'users' => User::query()
            // when there is a "search" key in the request
            // append to the query what's inside the closure
            ->when(request()->input('search'), function ($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->paginate(10)
            // include the query string in paginate URL
            ->withQueryString()
            ->through(fn($user) => [
                'id' => $user->id,
                'name' => $user->name
            ]),
        'filters' => request()->only(['search'])
    ]);
});

Route::post('/users', function () {
    $attributes = request()->validate([
        'name' => 'required',
        'email' => ['required','email'],
        'password' => 'required'
    ]);

    User::create($attributes);

    return redirect('/users');
});

Route::get('/users/create', function () {
    return inertia('Users/Create');
});

Route::get('/settings', function () {
    return inertia('Settings');
});

Route::post('/logout', function () {
    dd('logging the user out');
});
