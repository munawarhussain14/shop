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

/*
Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/customer/login', 'Auth\CustomerLoginController@showLoginForm')->name('customer.login');
Route::post('/customer/login', 'Auth\CustomerLoginController@login')->name('customer.login.post');
Route::post('/customer/logout', 'Auth\TeacherLoginController@logout')->name('customer.logout');
Route::get('/home', 'HomeController@index')->name('home');
/*Route::group(['middleware'=>'customer'], function() {
    Route::get('/home', 'HomeController@index')->name('home');
});*/


Auth::routes();

Route::get('/', 'DashboardController@index')->name('dashboard');

$controller = "CategoriesController";
$route_name = "categories";
$route_singular = "category";
Route::get("/$route_name", "$controller@index")->name("$route_name");
Route::get("/$route_singular/add", "$controller@add")->name("$route_singular.add");
Route::post("/$route_singular/add", "$controller@store")->name("$route_singular.store");
Route::get("/$route_singular/edit/{id}", "$controller@edit")->name("$route_singular.edit");
Route::post("/$route_singular/edit/{id}", "$controller@update")->name("$route_singular.update");
Route::get("/$route_singular/delete/{id}", "$controller@delete")->name("$route_singular.delete");
Route::get("/$route_singular/table", "$controller@table")->name("$route_name.table");

$controller = "StoresController";
$route_name = "stores";
$route_singular = "store";
Route::get("/$route_name", "$controller@index")->name("$route_name");
Route::get("/$route_singular/add", "$controller@add")->name("$route_singular.add");
Route::post("/$route_singular/add", "$controller@store")->name("$route_singular.store");
Route::get("/$route_singular/edit/{id}", "$controller@edit")->name("$route_singular.edit");
Route::post("/$route_singular/edit/{id}", "$controller@update")->name("$route_singular.update");
Route::get("/$route_singular/delete/{id}", "$controller@delete")->name("$route_singular.delete");
Route::get("/$route_singular/table", "$controller@table")->name("$route_name.table");

$controller = "BrandsController";
$route_name = "brands";
$route_singular = "brand";
Route::get("/$route_name", "$controller@index")->name("$route_name");
Route::get("/$route_singular/add", "$controller@add")->name("$route_singular.add");
Route::post("/$route_singular/add", "$controller@store")->name("$route_singular.store");
Route::get("/$route_singular/edit/{id}", "$controller@edit")->name("$route_singular.edit");
Route::post("/$route_singular/edit/{id}", "$controller@update")->name("$route_singular.update");
Route::get("/$route_singular/delete/{id}", "$controller@delete")->name("$route_singular.delete");
Route::get("/$route_singular/table", "$controller@table")->name("$route_name.table");

$controller = "ProductsController";
$route_name = "products";
$route_singular = "product";
Route::get("/$route_name", "$controller@index")->name("$route_name");
Route::get("/$route_singular/add", "$controller@add")->name("$route_singular.add");
Route::post("/$route_singular/add", "$controller@store")->name("$route_singular.store");
Route::get("/$route_singular/edit/{id}", "$controller@edit")->name("$route_singular.edit");
Route::post("/$route_singular/edit/{id}", "$controller@update")->name("$route_singular.update");
Route::get("/$route_singular/delete/{id}", "$controller@delete")->name("$route_singular.delete");
Route::get("/$route_singular/table", "$controller@table")->name("$route_name.table");

$controller = "MeasurementsController";
$route_name = "measurements";
$route_singular = "measurement";
Route::get("/$route_name", "$controller@index")->name("$route_name");
Route::get("/$route_singular/add", "$controller@add")->name("$route_singular.add");
Route::post("/$route_singular/add", "$controller@store")->name("$route_singular.store");
Route::get("/$route_singular/edit/{id}", "$controller@edit")->name("$route_singular.edit");
Route::post("/$route_singular/edit/{id}", "$controller@update")->name("$route_singular.update");
Route::get("/$route_singular/delete/{id}", "$controller@delete")->name("$route_singular.delete");
Route::get("/$route_singular/table", "$controller@table")->name("$route_name.table");

$controller = "CurrenciesController";
$route_name = "currencies";
$route_singular = "currency";
Route::get("/$route_name", "$controller@index")->name("$route_name");
Route::get("/$route_singular/add", "$controller@add")->name("$route_singular.add");
Route::post("/$route_singular/add", "$controller@store")->name("$route_singular.store");
Route::get("/$route_singular/edit/{id}", "$controller@edit")->name("$route_singular.edit");
Route::post("/$route_singular/edit/{id}", "$controller@update")->name("$route_singular.update");
Route::get("/$route_singular/delete/{id}", "$controller@delete")->name("$route_singular.delete");
Route::get("/$route_singular/table", "$controller@table")->name("$route_name.table");


/*
use App\Http\Resources\Customer as CustomerResources;
use App\Customer;

Route::get('/category/all', function () {
//    return new CustomerCollection(Customer::all());
    return CustomerResources::collection(Customer::find(1));
});*/
//Route::get('/home', 'HomeController@index')->name('home');
