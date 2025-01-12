<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\PlaceDetailController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\PlanDetailController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\TestController;


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


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('', [HomeController::class, 'index']);
// Route::get('/Place', [PlaceController::class, 'index']);
Route::get('/Place', [PlaceController::class, 'index'])->name('place.index');
Route::get('/PlaceDetail', [PlaceDetailController::class, 'index']);
Route::get('/Cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/Cart/post', [CartController::class, 'post']);
Route::get('/Plan', [PlanController::class, 'index']);
Route::get('/PlanDetail/{planId}', [PlanDetailController::class, 'index'])
    ->where('planId', 'osaka|kobe|kyoto|nara|wakayama|shiga|arashiyama|usj|arima|narapark|amanohashidate|himeji')
    ->name('plan.detail');
Route::get('/register',[RegisterController::class,'showRegisterForm'])->name('register');
Route::post('/register',[RegisterController::class,'register']);
Route::get('/password/reset',[ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::get('/Event', [EventController::class, 'index']);
Route::get('/api/events', [EventController::class, 'getEvents']);
Route::get('/Event/{id}', [EventController::class, 'detail'])->name('events.detail');
Route::get('/placeDetail/{id}', [PlaceDetailController::class, 'show'])->name('placeDetail');
Route::get('/PlanDetail/{planId?}', [PlanDetailController::class, 'index'])->name('plan.detail');
Route::get('/Result', [ResultController::class, 'index']);
Route::post('/api/chat', [ResultController::class, 'chat']);
Route::get('/PlaceDetail/{id}', [PlaceController::class, 'detail'])->name('place.detail');
Route::post('/api/generate-plan', [ResultController::class, 'generatePlan']);
Route::get('/Test', [TestController::class, 'index']);
Route::post('/api/chat', [TestController::class, 'chat']);





