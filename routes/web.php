<?php

use App\Http\Controllers\Auth;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\View\ViewController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Admin;
use App\Http\Middleware\CanMiddleware;
use App\Http\Middleware\EnsureEmailIsVerified;
use App\Http\Middleware\RedirectIfAdmin;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::middleware([
	'web',
	])->group(function () {
	// redirect
	Route::resource('post', PostController::class); 
	Route::redirect('/', '/dashboard', 301)->name('home');
	Route::get('/dashboard', [ViewController::class, 'builder'])->name('dashboard');
	// auth routes
	Route::controller(Auth\AuthController::class)
		->group(function () {
			Route::get('login', 'showLoginForm')->name('login');
			Route::post('login', 'LoginUsingCredentials');
			Route::match(['get', 'post'], '/logout', 'logout')->name('logout');
		});
	// registration routes
	Route::controller(Auth\RegisterController::class)
		->group(function () {
			Route::get('register', 'showRegisterForm')->name('register');
		});
	// password recovery routes
	Route::middleware('guest')
		->group(function () {
			Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
			Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
			Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
			Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.store');
		});

	/*
	|--------------------------------------------------------------------------
	| Authenticated routes
	|--------------------------------------------------------------------------
	*/
	Route::middleware('auth')
		->group(function () {
			/*
			|--------------------------------------------------------------------------
			| Password routes
			|--------------------------------------------------------------------------
			*/
			Route::controller(Auth\PasswordController::class)
				->group(function () {
					Route::get('confirm-password', 'show')->name('password.confirm');
					Route::post('confirm-password', 'store');
				});
			//bets page route
			Route::controller(ViewController::class)
				->group(function () {
					// Route::get('/bets', [BetsController::class, 'home'])->name('home');
					Route::group([
						'prefix' => 'bets',
						'as' => 'bets.',
					], function () {
						Route::get('/', 'builder')->name('index');
						Route::get('/{id}', 'builder')->where('id', '[0-9]+')->name('edit');
						Route::get('/results', 'builder')->name('results');
					});
				});
			// stats page routes
			Route::get('/stats', [ViewController::class, 'builder'])->name('stats');
			Route::get('/contact', [ViewController::class, 'builder'])->name('contact');
			/*
			|--------------------------------------------------------------------------
			| Email verification routes
			|--------------------------------------------------------------------------
			*/
			Route::controller(Auth\EmailVerificationController::class)
				->group(function () {
					// verify email view
					Route::get('verify-email', 'showVerificationEmailForm')->name('verification.notice');
					// resend verification email action
					Route::post('email/verification-notification', 'resendVerificationEmail')
						->middleware('throttle:6,1')
						->name('verification.send');
					// verify email action
					Route::get('verify-email/{id}/{hash}', 'verifyEmail')
						->middleware(['signed', 'throttle:6,1'])
						->name('verification.verify');
				});
			/*
			|--------------------------------------------------------------------------
			| Verified routes
			|--------------------------------------------------------------------------
			*/
			Route::middleware(EnsureEmailIsVerified::class)
				->group(function () {
					Route::controller(ViewController::class)
						->group(function () {
							// dashboard
							// Route::get('/dashboard', 'builder')->name('dashboard');
							// profile
							Route::group([
								'prefix' => 'profile',
								'as' => 'profile.',
							], function () {
								Route::get('/', 'builder')->name('index');
							});
							// users
							Route::middleware(RedirectIfAdmin::class)
								->group(function () {
									Route::group([
										'prefix' => 'users',
										'as' => 'users.',
									], function () {
										Route::get('/', 'builder')->name('index');
										Route::get('/{id}', 'builder')->where('id', '[0-9]+')->name('edit');
										Route::get('/create', 'builder')->name('store');
										Route::get('/options', 'builder')->name('options')->middleware(CanMiddleware::class . ':view_options_users');
									});
									// records
									Route::group([
										'prefix' => 'records',
										'as' => 'records.',
									], function () {
										Route::get('/', 'builder')->name('index');
										Route::get('/{id}', 'builder')->where('id', '[0-9]+')->name('edit');
										Route::get('/create', 'builder')->name('store');
									});
									// settings
									Route::group([
										'prefix' => 'settings',
										'as' => 'settings.',
										'middleware' => [
											CanMiddleware::class . ':view_settings'
										]
									], function () {
										Route::get('/', 'builder')->name('index');
										Route::get('/roles', 'builder')->name('roles');
									});

									//admin routes

									Route::group([
											'prefix'=> 'admin',
											'as' => 'admin.'
										],function () {
											Route::get('/', [ViewController::class, 'builder'])->name('index');
											Route::get('/users', [Admin\UserController::class, 'index'])->name('users');
											
										});
								});
						});
				});
		});
});
