<?php

use App\Http\Controllers\FormbuilderController;
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

Route::middleware(['splade'])->group(function () {
    Route::get('/', fn () => view('home'))->name('home');

    Route::get('/formbuilder', [FormbuilderController::class, 'basic'])->name('formbuilder.basic');
    Route::post('/formbuilder', [FormbuilderController::class, 'store'])->name('formbuilder.store');

    Route::get('/formbuilder-class', [FormbuilderController::class, 'formClass'])->name('formbuilder.form-class');
    Route::post('/formbuilder-class', [FormbuilderController::class, 'storeWithFormRequest'])->name('formbuilder.store-form-class');

    Route::get('/formbuilder-multi', [FormbuilderController::class, 'multi'])->name('formbuilder.multi');
    Route::post('/formbuilder-multi', [FormbuilderController::class, 'storeMulti'])->name('formbuilder.store-multi');

    Route::get('/formbuilder-files', [FormbuilderController::class, 'files'])->name('formbuilder.files');
    Route::post('/formbuilder-files', [FormbuilderController::class, 'storeFiles'])->name('formbuilder.store-files');

    Route::get('/formbuilder-model-binding', [FormbuilderController::class, 'model'])->name('formbuilder.model');
    Route::post('/formbuilder-model-binding', [FormbuilderController::class, 'storeModel'])->name('formbuilder.store-model');

    // Registers routes to support Table Bulk Actions and Exports...
    Route::spladeTable();

    // Registers routes to support async File Uploads with Filepond...
    Route::spladeUploads();
});
