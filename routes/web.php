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

use App\Http\Middleware\Redirect;

Route::get('/', function () {

    if(Auth::user()){

        $useremail = Auth::User()->email;

        $data = array(
            'prezentacije' => array(DB::table('prezentacije')->where('email_autora', $useremail)->get()),
            'pitanja' => array(DB::table('pitanja')->get())
        );

        return view('welcome')->with('data', $data);
        

    }

    else{
        return view('welcome');
    }

});


//Login i registracija
Route::post('/register', 'Auth\RegisterController@create');
Route::post('/login', 'Auth\LoginController@login');

//Logout
Route::post('/logout', 'Auth\LoginController@logout');


//Profil
Route::get('/profile', 'UserController@showProfile')->middleware(Redirect::class);
Route::post('/profile', 'UserController@updateAvatar')->middleware(Redirect::class);

//Dodavanje prezentacije
Route::post('/addpresentation', 'DashboardController@addPresentation')->middleware(Redirect::class);

//Brisanje prezentacije
Route::get('/presentationdelete/{idprezentacije}', 'DashboardController@deletePresentation')->middleware(RedirectIfAuthenticated::class);

//Gledanje prezentacije
Route::get('/presentation/{idprezentacije}', 'PresentationController@showPresentation');

//Dodavanje pitanja
Route::post('/addQuestion', 'QuestionController@addQuestion');

//Preview pitanja i odgovora
Route::get('/pitanje/{idprezentacije}/{i}', 'ShowQuestionController@showQuestionPage');

//Upravljanje pitanja i odgovora
Route::post('/editQuestion', 'QuestionController@editQuestion');
Route::get('/questiondelete/{presentationid}/{emailkorisnika}/{idpitanja}', 'QuestionController@deleteQuestion');




//Android serverside
Route::post('/getandroidquestion', 'AndroidController@getQuestion');
Route::post('/getandroidresponse', 'AndroidController@getAnswer');
Route::post('/registerandroiduser', 'AndroidController@registerUser');
Route::post('/getpresentations', 'AndroidController@getPresentations');