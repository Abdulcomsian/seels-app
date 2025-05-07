<?php

use App\Http\Controllers\Api\WoodpeckerController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\User\GrowController;
use App\Http\Controllers\User\InfoController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\User\BuildController;
use App\Http\Controllers\User\EmailController;
use App\Http\Controllers\User\ReachController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CompaignController;
use App\Http\Controllers\User\OnBoardingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/clear', function () {
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    return "Cleared";
});

Route::get('/', function () {
    return view('auth.login');
})->name('welcome');

Route::get('fetchData', [WoodpeckerController::class, 'getCampaignStats']);

Auth::routes(['verify' => true, 'login' => false, 'register' => false]);

Route::get('/logout', [HomeController::class, 'logout'])->name('logout');

Route::get('/user/signin', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/user/signin', [LoginController::class, 'login']);

Route::get('/user/signup', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/user/signup', [RegisterController::class, 'register']);

Route::group(
    ["middleware" => ["auth", 'verified']],
    function () {
        Route::get('dashboard', [HomeController::class, 'index'])->name('auth');
        Route::get('/dashboard/get-campaign-totals', [HomeController::class, 'getCampaignTotals']);
        Route::get('/dashboard/refresh-campaign-totals', [HomeController::class, 'refreshCampaignTotals']);

        Route::get('my-profile', [UserController::class, 'editprofile'])->name('myprofile');
        Route::put('edit-my-profile', [UserController::class, 'updatemyprofile'])->name('updatemyprofile');

        // change password
        Route::get('/settings', [HomeController::class, 'changePassword'])->name('change_password');
        Route::post('/change-password/update', [HomeController::class, 'updatePassword'])->name('update_password');

        Route::get('/fetch-messages', [CommentController::class, 'fetchMessages'])->name('fetchMessages');
        Route::post('/send-message', [CommentController::class, 'sendMessage'])->name('sendMessage');

        Route::group(
            ["middleware" => "role:admin"],
            function () {
                Route::resource('users', UserController::class);
                Route::get('/get-leads-by-compaign/{id}/{user_id}', [UserController::class, 'getLeadsByCompaign']);
                Route::get('/search-leads', [UserController::class, 'searchLeads']);
                Route::post('users/import-csv/{id}', [UserController::class, 'importCsv'])->name('users.importCsv');
                Route::post('users/export-csv', [UserController::class, 'export'])->name('users.leads.export');
                Route::get('users/email/{id}', [UserController::class, 'email'])->name('users.email');
                Route::post('users/update/email/{id}', [UserController::class, 'updateEmail'])->name('users.update.email');

                Route::resource('compaigns', CompaignController::class);
                Route::post('/compaigns/update/{id}', [CompaignController::class, 'update'])->name('compaigns.update');
                Route::post('/compaigns/toggle-status/{id}', [CompaignController::class, 'toggleStatus'])->name('compaigns.toggleStatus');
            }
        );

        Route::group(
            ["middleware" => "role:customer"],
            function () {
                Route::resource('onboarding', OnBoardingController::class);
                Route::resource('build', BuildController::class);
                Route::get('/user-get-leads-by-compaign/{id}', [BuildController::class, 'getUserLeadsByCompaign']);
                Route::resource('emails', EmailController::class);
                Route::resource('reach', ReachController::class);
                Route::resource('grow', GrowController::class);
                Route::resource('info', InfoController::class);
            }
        );
    }
);
