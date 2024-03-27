<?php

use App\Http\Controllers\Auth;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\View\ViewController;
use App\Http\Controllers\Admin;
use App\Http\Controllers\TelegramController;
use App\Http\Middleware\CanMiddleware;
use App\Http\Middleware\EnsureEmailIsVerified;
use App\Http\Middleware\RedirectIfAdmin;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
Route::get('/activeUsers', [Admin\UserController::class, 'getActiveUsers']);

Route::get('/td/new/{id}', [TelegramController::class, 'subscribe'])->name('td.subscribe');

Route::get('/td/getupdate', [TelegramController::class, 'getUpdate'])->name('td.getupdate');

Route::middleware([
	'web',
	])->group(function () {
	// redirect
	Route::redirect('/', '/dashboard', 301)->name('home');
	Route::get('/dashboard', [ViewController::class, 'render_dashboard'])->name('dashboard');
	Route::get('/terms', [ViewController::class, 'builder'])->name('terms');
	Route::get('/aboutus', [ViewController::class, 'builder'])->name('aboutus');
	Route::get('/privacy', [ViewController::class, 'builder'])->name('privacy');
	Route::get('/stats', [ViewController::class, 'render_stats'])->name('stats');
	Route::get('/contact', [ViewController::class, 'builder'])->name('contact');
	Route::post('/contact', [ContactController::class, 'store']);
	Route::get('bets/results', [ViewController::class, 'render_results'])->name('bets.results');
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
						Route::get('/', 'render_bets')->name('index');
						Route::get('/{id}', 'render_abet')->where('id', '[0-9]+');
					});
					Route::group([
						'prefix' => 'account',
						'as' => 'account.',
					], function () {
						Route::get('/', 'render_account')->name('index');
						Route::post('/', 'profile')->name('profile');
						Route::get('/subscriptions', 'render_subscriptions')->name('subscriptions');
					});
				});
			// stats page routes
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
					Route::get('/buy/subscription/{id}', [PaymentController::class, 'buy'])->name('pay.subscription');
					Route::get('/subscript/{id}', [PaymentController::class, 'subscript'])->name('subscript');
					Route::post('paypal/payment', [PayPalController::class, 'payment'])->name('paypal.payment');
					Route::get('paypal/payment/success/{id}', [PayPalController::class, 'paymentSuccess'])->name('paypal.payment.success');
					Route::get('paypal/payment/cancel', [PayPalController::class, 'paymentCancel'])->name('paypal.payment/cancel');
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
											Route::get('/', [ViewController::class, 'render_admin'])->name('index');

											Route::prefix('texts')->group(function () {
												Route::get('/', [Admin\TextController::class, 'index'])->name('texts');
												Route::get('/new', [Admin\TextController::class, 'create'])->name('texts.create');
												Route::post('/new', [Admin\TextController::class, 'store']);
												Route::get('/{id}', [Admin\TextController::class, 'edit'])->name('texts.edit');
												Route::post('/{id}', [Admin\TextController::class, 'update']);
											});

											Route::prefix('contacts')->group(function () {
												Route::get('/', [Admin\ContactController::class,'index'])->name('contacts');
												Route::get('/{id}', [Admin\ContactController::class,'contact'])->name('singlecontact');
											});

											Route::prefix('users')->group(function () {
												Route::get('/', [Admin\UserController::class, 'index'])->name('users');
												Route::get('/create', [Admin\UserController::class, 'create'])->name('users.create');
												Route::get('/{id}', [Admin\UserController::class, 'edit'])->name('users.edit');
												Route::get('/{id}/{sid}', [Admin\UserController::class, 'expire'])->name('users.expire');
												Route::post('/{id}', [Admin\UserController::class, 'update']);
												Route::get('/{id}/delete', [Admin\UserController::class, 'delete'])->name('users.delete');
												Route::post('/{id}/addsubscription', [Admin\UserController::class, 'addsubscription'])->name('users.add');
											});

											Route::prefix('subscriptions')->group(function () {
												Route::get('/', [Admin\SubscriptionsController::class, 'index'])->name('subscriptions');
												Route::get('/create', [Admin\SubscriptionsController::class, 'create'])->name('subscriptions.create');
												Route::post('create', [Admin\SubscriptionsController::class, 'store']);
												Route::get('/{id}', [Admin\SubscriptionsController::class, 'edit'])->name('subscriptions.edit');
												Route::post('/{id}', [Admin\SubscriptionsController::class, 'update']);
												Route::get('/{id}/delete', [Admin\SubscriptionsController::class, 'delete'])->name('subscriptions.delete');
											});

											Route::group(['prefix' => 'posts'], function () {
												Route::get('/', [Admin\PostsController::class, 'index'])->name('posts');
												Route::get('/create', [Admin\PostsController::class, 'create'])->name('posts.create');
												Route::get('/{id}', [Admin\PostsController::class, 'edit'])->name('posts.edit');
												Route::post('/create', [Admin\PostsController::class, 'store']);
												Route::post('/{id}', [Admin\PostsController::class, 'update']);
												Route::get('/{id}/delete', [Admin\PostsController::class,'delete'])->name('posts.delete');
												Route::get('/{id}/win', [Admin\PostsController::class,'win'])->name('posts.win');
												Route::get('/{id}/lose', [Admin\PostsController::class,'lose'])->name('posts.lose');
											});
										});
								});
						});
				});
		});
});
