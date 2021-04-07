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

Route::get('/', function () {
    return view('welcome');
});

Route::get('test', function () {
    return view('export_sheet');
});

Auth::routes(['register' => false]);

Route::get('home', 'HomeController@dashboard')->name('home');

Route::get('report', 'HomeController@report')->name('report');
Route::get('filter', 'HomeController@filtering')->name('report.post');
Route::middleware(['admin'])->group(function () {
Route::post('checkout-all', 'HomeController@checkout')->name('checkout-all');
Route::post('import', 'StudentsController@importExcel')->name('student.excel');
Route::get('logbook', 'HomeController@index')->name('log');
Route::post('log', 'HomeController@create')->name('log_update');
    Route::resource('student','StudentsController');
    Route::get('on', 'HomeController@public')->name('public_view');
});
