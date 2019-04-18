<?php

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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/projects/import', 'ProjectController@import')->name('projects.import');
    Route::post('/projects/reorder','ProjectController@reorder')->name('projects.reorder');
    Route::resource('/dashboard', 'DashboardController');
    Route::resource('/applications', 'ApplicationController');
    Route::resource('/languages', 'LanguageController');
    Route::resource('/servers', 'ServerController');
    Route::resource('/frameworks', 'FrameworkController');
    Route::resource('/projects', 'ProjectController');
    Route::resource('/experiences', 'ExperienceController');
    Route::resource('/diplomas', 'DiplomaController');
    Route::resource('/cover_letters', 'CoverLetterController');
});
Route::get('/resume/{coverLetter}', 'ResumeController@index')->name('resume.index');
Route::post('/contact', 'ContactController@send')->name('contact.send');
