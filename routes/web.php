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

Route::get('/laravel', function () {
    return view('welcome');
});

Route::get('/', 'App\Http\Controllers\CreateStartPage@showStartPage')
    ->middleware('statistics');
    //->middleware('initialInstallation');

Route::get('/about_me','App\Http\Controllers\AboutMe@showAboutMe')
    ->middleware('statistics');

Route::get('/about_me/work_experience','App\Http\Controllers\WorkExperience@showWorkExperience')
    ->middleware('statistics');

Route::get('/completed_projects','App\Http\Controllers\CompletedProjects@showCompletedProjects')
    ->middleware('statistics');

Route::get('/feedback','App\Http\Controllers\Feedback@showFeedback')
    ->middleware('statistics');

Route::post('/send_message','App\Http\Controllers\Feedback@sendMessage')
    ->middleware('statistics');

//Administration
Route::match(['get', 'post'], '/admin', 'App\Http\Controllers\Admin@admin')
  ->middleware('authenticateVisit');

Route::post('/admin/completedProjectsUpdate', 'App\Http\Controllers\Admin@completedProjectsUpdate')
  ->middleware('authenticateVisit');

Route::post('/admin/completedProjectsDelete', 'App\Http\Controllers\Admin@completedProjectsDelete')
    ->middleware('authenticateVisit');

Route::post('/admin/informationAboutCoursesUpdate','App\Http\Controllers\Admin@informationAboutCoursesUpdate')
    ->middleware('authenticateVisit');

Route::post('/admin/informationAboutCoursesDelete','App\Http\Controllers\Admin@informationAboutCoursesDelete')
    ->middleware('authenticateVisit');

Route::post('/admin/informationAboutEducationsUpdate','App\Http\Controllers\Admin@informationAboutEducationsUpdate')
    ->middleware('authenticateVisit');

Route::post('/admin/informationAboutEducationsDelete','App\Http\Controllers\Admin@informationAboutEducationsDelete')
    ->middleware('authenticateVisit');

Route::post('/admin/informationAboutProgrammerUpdate','App\Http\Controllers\Admin@informationAboutProgrammerUpdate')
        ->middleware('authenticateVisit');

Route::post('/admin/informationAboutProgrammerDelete','App\Http\Controllers\Admin@informationAboutProgrammerDelete')
        ->middleware('authenticateVisit');

Route::post('/admin/informationSkillVariablesUpdate','App\Http\Controllers\Admin@informationSkillVariablesUpdate')
        ->middleware('authenticateVisit');

Route::post('/admin/informationSkillDelete','App\Http\Controllers\Admin@informationSkillDelete')
        ->middleware('authenticateVisit');

Route::post('/admin/informationSkillUpdate','App\Http\Controllers\Admin@informationSkillUpdate')
        ->middleware('authenticateVisit');

Route::post('/admin/informationLinkDelete','App\Http\Controllers\Admin@informationLinkDelete')
        ->middleware('authenticateVisit');

Route::post('/admin/informationLinkUpdate','App\Http\Controllers\Admin@informationLinkUpdate')
        ->middleware('authenticateVisit');

Route::post('/admin/informationInterestsDelete','App\Http\Controllers\Admin@informationInterestsDelete')
        ->middleware('authenticateVisit');

Route::post('/admin/informationInterestsUpdate','App\Http\Controllers\Admin@informationInterestsUpdate')
        ->middleware('authenticateVisit');

Route::post('/admin/informationServicesDelete','App\Http\Controllers\Admin@informationServicesDelete')
        ->middleware('authenticateVisit');

Route::post('/admin/informationServicesUpdate','App\Http\Controllers\Admin@informationServicesUpdate')
        ->middleware('authenticateVisit');

Route::post('/admin/informationExperienceDelete','App\Http\Controllers\Admin@informationExperienceDelete')
        ->middleware('authenticateVisit');

Route::post('/admin/informationExperienceUpdate','App\Http\Controllers\Admin@informationExperienceUpdate')
        ->middleware('authenticateVisit');

Route::post('/admin/changingThePassword','App\Http\Controllers\Admin@changingThePassword')
        ->middleware('authenticateVisit');

Route::get('/admin/authorization','App\Http\Controllers\Authorization@mainMethod');

Route::post('/admin/authentication','App\Http\Controllers\Authorization@authentication');

//Start initialization DB добавить аутентификацию
//Route::get('/InitDB', 'App\Http\Controllers\InitDB@init');

Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');

    return "Кэш очищен.";
});
