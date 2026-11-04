<?php

use Illuminate\Support\Facades\Route;

Route::get('/form-builder-test', function () {

    return "Form Builder Package Loaded";

});

use Prasanth\FormBuilder\Controllers\BuilderController;
use Prasanth\FormBuilder\Controllers\FormController;
use Prasanth\FormBuilder\Controllers\FormScreenController;
use Prasanth\FormBuilder\Controllers\FormFieldController;
use Prasanth\FormBuilder\Controllers\FormSectionController;


Route::middleware(['web', 'auth'])
    ->prefix('admin/forms')
    ->group(function () {

    // FORMS ROUTES

    Route::get(
        '/',
        [FormController::class,'index']
    )->name('formbuilder.forms.index');

    Route::get(
        '/create',
        [FormController::class,'create']
    )->name('formbuilder.forms.create');

    Route::post(
        '/store',
        [FormController::class,'store']
    )->name('formbuilder.forms.store');

    Route::get(
        '/{form}/edit',
        [FormController::class,'edit']
    )->name('formbuilder.forms.edit');

    Route::put(
        '/{form}/update',
        [FormController::class,'update']
    )->name('formbuilderforms.update');

    Route::delete(
    '/{id}',
    [FormController::class, 'destroy']
)->name('formbuilder.forms.destroy');

// Builder Routes

Route::get(
    '/{id}/builder',
    [BuilderController::class, 'index']
)->name('formbuilder.builder');

Route::get(
    '/builder/property/{type}/{id}',
    [BuilderController::class,'property']
);

Route::get(
    '/{id}/json-preview',
    [BuilderController::class,'jsonPreview']
);

Route::post(
    '/{id}/publish',
    [BuilderController::class,'publish']
);

Route::prefix('{id}/builder')->group(function () {

    Route::post(
        '/screens/sort',
        [BuilderController::class, 'sortScreens']
    )->name('formbuilder.screens.sort');

    Route::post(
        '/sections/sort',
        [BuilderController::class, 'sortSections']
    )->name('formbuilder.sections.sort');

    Route::post(
        '/fields/sort',
        [BuilderController::class, 'sortFields']
    )->name('formbuilder.fields.sort');

});


//FORM SCREENS ROUTES

Route::post(
    '/{id}/screens',
    [FormScreenController::class, 'store']
)->name('formbuilder.screens.store');

Route::put(
    '/screens/{id}',
    [FormScreenController::class, 'update']
)->name('formbuilder.screens.update');

Route::delete(
    '/screens/{id}',
    [FormScreenController::class, 'destroy']
)->name('formbuilder.screens.destroy');

//FORM SECTIONS ROUTES
Route::post(
    '/{id}/sections',
    [FormSectionController::class,'store']
)->name('formbuilder.sections.store');

Route::put(
    '/sections/{id}',
    [FormSectionController::class,'update']
)->name('formbuilder.sections.update');

Route::delete(
    '/sections/{id}',
    [FormSectionController::class,'destroy']
)->name('formbuilder.sections.destroy');

Route::get(
    '/screens/{id}/sections',
    [FormSectionController::class,'byScreen']
)->name('formbuilder.sections.byScreen');

//FORM FIELDS ROUTES

Route::get(
        '/{id}/fields',
        [FormFieldController::class, 'index']
    );

    Route::get(
        '/{id}/fields/create',
        [FormFieldController::class, 'create']
    );

 Route::post(
            '/{id}/fields',
            [FormFieldController::class, 'store']
        )->name('formbuilder.fields.store');

  Route::put(
    '/fields/{id}',
    [FormFieldController::class,'update']
)->name('formbuilder.fields.update');  

Route::delete(
    '/fields/{id}',
    [FormFieldController::class,'destroy']
)->name('formbuilder.fields.destroy');

});