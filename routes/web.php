<?php

use Illuminate\Support\Facades\Route;

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
    $qp = request()->query();
    $perPage = request()->input('perPage') ?? 10;
    $searchTerm = request()->input('searchTerm') ?? '';
    $sortField = request()->input('sortField') ?? 'name';
    $sortOrder = request()->input('sortOrder') ?? 'asc';

    return view('welcome', [
        'qp' => $qp,
        'perPage' => $perPage,
        'searchTerm' => $searchTerm,
        'sortField' => $sortField,
        'sortOrder' => $sortOrder,
    ]);
});
