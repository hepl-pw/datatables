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
    $qp['perPage'] = $perPage = request()->input('perPage') ?? 10;
    $qp['searchTerm'] = $searchTerm = request()->input('searchTerm') ?? '';
    $qp['sortField'] = $sortField = request()->input('sortField') ?? 'name';
    $qp['sortOrder'] = $sortOrder = request()->input('sortOrder') ?? 'asc';
    $qp['page'] = $page = request()->input('page') ?? 1;

    return view('welcome', [
        'qp' => $qp,
        'perPage' => $perPage,
        'searchTerm' => $searchTerm,
        'sortField' => $sortField,
        'sortOrder' => $sortOrder,
        'page' => $page,
    ]);
});
