<?php

use App\Http\Controllers\ChatController;
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

require __DIR__ . '/auth.php';

Route::get('/', function () {
    return redirect('/home');
})->middleware(['auth']);

Route::get('/offline', function () {
    return view('offline.index');
});

Route::get('/splashscreen', function () {
    return view('splashscreen');
});

Route::get('/fetch/csrf', function () {
    $token = csrf_token();
    return json_encode($token);
});

Route::get('/fetch/checkAuth', function () {
    if (Auth::check()) {
        return json_encode('true');
    } else {
        return json_encode('false');
    }
});

Route::get('/fetch/user', function () {
    if (Auth::check()) {
        return json_encode(auth()->user());
    } else {
        return json_encode('false');
    }
});

//////////////////////////////////////////////////////////////////////////////////////////////////
// Home Controller
//////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('home', 'App\Http\Controllers\HomeController@index');
//////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////////////
//Notification Controller
//////////////////////////////////////////////////////////////////////////////////////////////////
Route::resource('notification', 'App\Http\Controllers\NotificationController');
//////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////////////
//Chat Controller
//////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('chat/{user_id}',[ChatController::class, 'show'])->name('chat.show');
Route::resource('chat', 'App\Http\Controllers\ChatController');
//////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////////////
//Meet Controller
//////////////////////////////////////////////////////////////////////////////////////////////////
Route::post('fetch/getScheduleMeeting', 'App\Http\Controllers\MeetController@getScheduleMeeting');
Route::post('fetch/getMeetingInProgress', 'App\Http\Controllers\MeetController@getMeetingInProgress');
Route::get('meetroom', 'App\Http\Controllers\MeetController@indexpublic');
Route::post('fetch/storeMeetingSchedule', 'App\Http\Controllers\MeetController@storeMeetingSchedule');
Route::post('fetch/updateMeetingSchedule/{id}', 'App\Http\Controllers\MeetController@updateMeetingSchedule');
Route::post('fetch/deleteMeetingSchedule/{id}', 'App\Http\Controllers\MeetController@deleteMeetingSchedule');
Route::get('fetch/scheduleLog', 'App\Http\Controllers\MeetController@scheduleLog');
Route::get('fetch/scheduleLog/{id}', 'App\Http\Controllers\MeetController@scheduleLogSpecific');
Route::get('fetch/meetingLog', 'App\Http\Controllers\MeetController@meetingLog');
Route::post('fetch/storeMeetingPass', 'App\Http\Controllers\MeetController@storeMeetingPass');
Route::post('fetch/storeMeetingInProgress', 'App\Http\Controllers\MeetController@storeMeetingInProgress');
Route::post('fetch/storeMeetingNotStart', 'App\Http\Controllers\MeetController@storeMeetingNotStart');
Route::resource('meet', 'App\Http\Controllers\MeetController');
//////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////////////
//File Controller
//////////////////////////////////////////////////////////////////////////////////////////////////
Route::resource('file', 'App\Http\Controllers\FileController');
//////////////////////////////////////////////////////////////////////////////////////////////////
