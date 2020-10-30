<?php

use App\Models\Contact;
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
    $perPage = request()->input('per-page') ?? 10;
    $searchTerm = request()->input('search-term') ?? '';
    $sortField = request()->input('sort-field') ?? 'name';

    return view('welcome', [
        'qp' => $qp,
        'perPage' => $perPage,
        'searchTerm' => $searchTerm,
        'sortField' => $sortField,
        'contacts' =>
            Contact::query()
                ->where('name', 'like', '%'.$searchTerm.'%')
                ->orWhere('email', 'like', '%'.$searchTerm.'%')
                ->orderBy($sortField)
                ->paginate($perPage)
    ]);
});
