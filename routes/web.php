<?php

use App\Http\Controllers\Portal\PatientController;
use App\Http\Controllers\Portal\PdfController;
use App\Http\Livewire\Dashboard;
use Illuminate\Support\Facades\Route;

Route::redirect('/','dashboard');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::name('portal.')->middleware('changeLocal')->group(function () {
//        Route::get('/patients', action: [PatientController::class, 'list'])->name('patients.list');
//        Route::get('/patients/{id}/edit', action: [PatientController::class, 'list'])->name('patients.list');
        Route::controller(PatientController::class)->group(function () {
            Route::get('/patients', 'index')->name('patients.index');
            Route::get('/patients/{id}/edit', 'edit')->name('patients.edit');
            Route::get('/patients/create', 'create')->name('patients.create');
            Route::get('/patients/make_appointment', 'make_appointment')->name('patients.make_appointment');
            Route::get('/patients/edit_appointment', 'edit_appointment')->name('patients.edit_appointment');
            Route::get('/patients/take_sign', 'take_sign')->name('patients.take_sign');
            Route::get('/patients/edit_sign', 'edit_sign')->name('patients.edit_sign');
            Route::get('/patients/do_interview', 'do_interview')->name('patients.do_interview');
            Route::get('/patients/edit_interview', 'edit_interview')->name('patients.edit_interview');
            Route::get('/patients/add_analytics_result', 'add_analytics_result')->name('patients.add_analytics_result');
            Route::get('/patients/follow_interview', 'follow_interview')->name('patients.follow_interview');
        });
        Route::controller(PdfController::class)->group(function () {
            Route::get('/pdf/show_default', 'show_default')->name('pdf.show-default');
            Route::get('/pdf/show_analytic_results', 'show_analytic_results')->name('pdf.show-analytic-results');
            Route::get('/pdf/show_analytic_request', 'show_analytic_request')->name('pdf.show-analytic-request');
            Route::get('/pdf/show_recipe_request', 'show_recipe_request')->name('pdf.show-recipe-request');
            Route::get('/pdf/show_xray_request', 'show_xray_request')->name('pdf.show-xray-request');
            Route::get('/pdf/show_action_request', 'show_action_request')->name('pdf.show-action-request');
        });
    });
});
//Route::group(['prefix' => 'portal','middleware' => 'auth:sanctum'], function () {
//    Route::get('/dashboard', Dashboard::class)->name('dashboard');
//    Route::get('/patients', action: [PatientController::class,'list'])->name('patients.list');
//});
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
