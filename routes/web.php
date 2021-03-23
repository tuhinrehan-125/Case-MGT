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
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});

Route::get('/', 'FrontendController@index')->name('home-page');
Route::get('/unitauth', 'FrontendController@UnitHome');

Route::get('/unit', 'FrontendController@UnitHome');
Route::get('/dcb', 'FrontendController@SuperadminHome');

/*=============================search=============================*/
Route::get('/search','HomeController@search_index')->name('search');
/*=============================search=============================*/

Route::post('/user-logout','User\UserController@Logout')->name('user.logout');
Route::post('/user-login','User\UserController@LoginCheck')->name('user.login');
Route::post('/user-login-verification','User\UserController@LoginCheckVerify')->name('user.verify.login');

Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/reset', 'Auth\ForgotPasswordController@reset')->name('password.update');
Route::get('password/reset/{token}', 'Auth\ForgotPasswordController@showResetForm')->name('password.reset');

Route::group(['middleware' => 'prevent_back_history'],function(){
    Route::group(['prefix' => 'superadmin'], function () {
    Route::get('/login', 'SuperadminAuth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'SuperadminAuth\LoginController@login');
    Route::post('/logout', 'SuperadminAuth\LoginController@logout')->name('logout');

    Route::get('/register', 'SuperadminAuth\RegisterController@showRegistrationForm')->name('register');
    Route::post('/register', 'SuperadminAuth\RegisterController@register');

    Route::post('/password/email', 'SuperadminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
    Route::post('/password/reset', 'SuperadminAuth\ResetPasswordController@reset')->name('password.email');
    Route::get('/password/reset', 'SuperadminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
    Route::get('/password/reset/{token}', 'SuperadminAuth\ResetPasswordController@showResetForm');
    });

    Auth::routes();
    Route::group(['prefix' => 'unitauth'], function () {
    Route::get('/login', 'UnitauthAuth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'UnitauthAuth\LoginController@login');
    Route::post('/logout', 'UnitauthAuth\LoginController@logout')->name('logout');

    Route::get('/register', 'UnitauthAuth\RegisterController@showRegistrationForm')->name('register');
    Route::post('/register', 'UnitauthAuth\RegisterController@register');

    Route::post('/password/email', 'UnitauthAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
    Route::post('/password/reset', 'UnitauthAuth\ResetPasswordController@reset')->name('password.email');
    Route::get('/password/reset', 'UnitauthAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
    Route::get('/password/reset/{token}', 'UnitauthAuth\ResetPasswordController@showResetForm');
    });

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/home', 'User\UserController@Dashboard')->name('home');
        Route::get('Unit-user-profile', 'User\UserController@Profile')->name('user.profile');
        Route::post('Unit-user-profile-update', 'User\UserController@ProfileUpdate')->name('user.update');
        Route::post('Unit-user-profile-password-change', 'User\UserController@ProfilePasswordUpdate')->name('user.passupdate');

        Route::get('/new-case', 'User\UserController@NewCase')->name('new.case');
        Route::get('/old-case', 'User\UserController@OldCase')->name('old.case');
        Route::get('/withdraw-case/{id?}', 'User\UserController@withDraw')->name('withdraw.case');
        Route::get('/withdraw-check-case/{id?}', 'User\UserController@withDrawCheck')->name('withdrawcheck.case');
        Route::post('/withdraw-request', 'User\UserController@withdrawRequest')->name('withdra.request');
        Route::post('/withdraw-request-update', 'User\UserController@withdrawRequestUpdate')->name('withdra.request.update');

    });
    // SSLCOMMERZ Start
    Route::get('/example1', 'SslCommerzPaymentController@exampleEasyCheckout');
    Route::get('/example2', 'SslCommerzPaymentController@exampleHostedCheckout');

    Route::post('/pay', 'SslCommerzPaymentController@index')->name('withdraw.request');
    Route::post('/pay-via-ajax', 'SslCommerzPaymentController@payViaAjax');

    Route::post('/success', 'SslCommerzPaymentController@success');
    Route::post('/fail', 'SslCommerzPaymentController@fail');
    Route::post('/cancel', 'SslCommerzPaymentController@cancel');

    Route::post('/ipn', 'SslCommerzPaymentController@ipn');
//SSLCOMMERZ END
});
