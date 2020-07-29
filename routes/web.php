<?php

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
//     return view('home');
// });

Route::get('/', 'HomeController@index')->name('home');

Auth::routes(['register' => false, 'reset' => false, 'verify' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/pramuka', 'HomeController@pramuka')->name('home.pramuka');
Route::post('/pramuka-store', 'HomeController@pramuka_store')->name('pramuka.store');

Route::get('/paskibra', 'HomeController@paskibra')->name('home.paskibra');
Route::post('/paskibra-store', 'HomeController@paskibra_store')->name('paskibra.store');

Route::get('/pencak-silat', 'HomeController@silat')->name('home.silat');
Route::post('/silat-store', 'HomeController@silat_store')->name('silat.store');

Route::get('/rohis', 'HomeController@rohis')->name('home.rohis');
Route::post('/rohis-store', 'HomeController@rohis_store')->name('rohis.store');

Route::get('/marching-band', 'HomeController@marching')->name('home.marching');
Route::post('/marching-store', 'HomeController@marching_store')->name('marching.store');

Route::get('/bengkel-seni', 'HomeController@seni')->name('home.seni');
Route::post('/seni-store', 'HomeController@seni_store')->name('seni.store');

Route::get('/futsal', 'HomeController@futsal')->name('home.futsal');
Route::post('/futsal-store', 'HomeController@futsal_store')->name('futsal.store');

Route::get('/volly', 'HomeController@volly')->name('home.volly');
Route::post('/volly-store', 'HomeController@volly_store')->name('volly.store');

Route::get('/pmr', 'HomeController@pmr')->name('home.pmr');
Route::post('/pmr-store', 'HomeController@pmr_store')->name('pmr.store');

Route::group(['namespace' => 'Admin', 'prefix' => 'administrator', 'middleware' => 'auth'], function () {
    Route::name('administrator.')->group(function () {
        Route::get('/', 'HomeController@index')->name('dashboard');
        Route::group(['middleware' => ['role:Admin']], function () {
            Route::resource('/users', 'UsersController');
        });

        Route::group(['middleware' => ['role:Rohis|Admin']], function () {
            Route::get('/rohis/pdf', 'RohisController@cetak')->name('rohis.cetak');
            Route::resource('/rohis', 'RohisController');
        });

        Route::group(['middleware' => ['role:Pramuka|Admin']], function () {
            Route::get('/pramuka/pdf', 'PramukaController@cetak')->name('pramuka.cetak');
            Route::resource('/pramuka', 'PramukaController');
        });

        Route::group(['middleware' => ['role:Pmr|Admin']], function () {
            Route::get('/pmr/pdf', 'PmrController@cetak')->name('pmr.cetak');
            Route::resource('/pmr', 'PmrController');
        });

        Route::group(['middleware' => ['role:Silat|Admin']], function () {
            Route::get('/silat/pdf', 'SilatController@cetak')->name('silat.cetak');
            Route::resource('/silat', 'SilatController');
        });

        Route::group(['middleware' => ['role:Volly|Admin']], function () {
            Route::get('/volly/pdf', 'VollyController@cetak')->name('volly.cetak');
            Route::resource('/volly', 'VollyController');
        });

        Route::group(['middleware' => ['role:Paskibra|Admin']], function () {
            Route::get('/paskibra/pdf', 'PaskibraController@cetak')->name('paskibra.cetak');
            Route::resource('/paskibra', 'PaskibraController');
        });

        Route::group(['middleware' => ['role:Futsal|Admin']], function () {
            Route::get('/futsal/pdf', 'FutsalController@cetak')->name('futsal.cetak');
            Route::resource('/futsal', 'FutsalController');
        });

        Route::group(['middleware' => ['role:Marching|Admin']], function () {
            Route::get('/marching/pdf', 'MarchingController@cetak')->name('marching.cetak');
            Route::resource('/marching', 'MarchingController');
        });

        Route::group(['middleware' => ['role:Seni|Admin']], function () {
            Route::get('/seni/pdf', 'SeniController@cetak')->name('seni.cetak');
            Route::resource('/seni', 'SeniController');
        });
    });
});
