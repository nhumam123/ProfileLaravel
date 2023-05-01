<?php

use App\Http\Controllers\CvPageController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SkillController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });
$url = env('APP_URL');

Route::domain($url)->group(function () {
    Route::get('/', [CvPageController::class, 'index'])->name('/');
});


Route::domain('admin.' . $url)->middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return redirect('/dashboard/profiles/edit');
    })->name('/dashboard/profiles/edit');
    Route::prefix('dashboard')->group(function () {
        Route::resource('experiences', ExperienceController::class);
        Route::resource('skills', SkillController::class);
        Route::get('/profiles/edit', [ProfileController::class, 'edit'])->name('profiles.edit');
        Route::patch('/profiles', [ProfileController::class, 'update'])->name('profiles.update');
        Route::resource('educations', EducationController::class);
    });

});

Auth::routes();

