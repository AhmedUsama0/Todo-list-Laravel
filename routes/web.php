<?php

use App\Http\Controllers\TaskController;
use App\Mail\ResetPasswordMail;
use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//this is do the same $this->middleware('auth) do
Route::middleware('auth')->group(function () {

    //if a group of routes use the same controller we can define them like this
    Route::controller(TaskController::class)->group(function () {

        //if a group of routes share the same prefix we can use prefix method to handle this
        Route::prefix('/task')->group(function () {
            Route::match(['get', 'post'], '/index', 'index')->name('show-tasks');
            Route::match(['get', 'post'], '/create', 'store')->name('create-tasks');
            Route::delete('/delete/{id}', 'destroy')->name('delete-tasks');
        });
    });
});



// Route::post('/email',function(){
//     Mail::to(request('email'))->send(new ResetPasswordMail());
//     return redirect('/password/reset')->with('msg','A link sent to your email');
// });



// Route::get('/token',function(){
//     $token = csrf_token();
//     return $token;
// });

// Route::get('/msg',function(){
//     return new ResetPasswordMail();
// });



Auth::routes();






// Route::get('/email',function(){
//     return new ResetPasswordMail();
// });


// Route::post('/email' ,'App\Http\Controllers\SendMailController@resetPasswordMail');
// Route::post('/email',function() {
//     Mail::to(request('email'))->send(new ResetPasswordMail());
//     return redirect('/password/reset')->with('msg','A link sent to your email');
// });