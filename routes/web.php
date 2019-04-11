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
    Route::get('/projects/import', 'ProjectsController@import')->name('projects.import');
    Route::resource('/dashboard', 'DashboardController');
    Route::resource('/skills', 'SkillsController');
    Route::resource('/projects', 'ProjectsController');
    Route::resource('/jobs', 'ResumeJobsController');
    Route::resource('/educations', 'EducationsController');
    Route::resource('/cover_letters', 'CoverLettersController');
});
Route::get('/resume', 'ResumeController@index')->name('resume.index');
Route::post('/contact', 'ContactController@send')->name('contact.send');
