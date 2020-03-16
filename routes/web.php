<?php

use Illuminate\Support\Facades\Route;
use App\Events\OrderStatus;

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
class Order{

	public $id;

	public function __construct($id){
		$this->id = $id;
	}
}

Route::get('/', function () {
	
    return view('welcome');
});

Route::get('projects', 'ProjectController@index');

Route::get('/projects/{project}', 'ProjectController@show');

Route::get('/tasks/{project}', 'TaskController@index');

Route::post('task/{project}', 'TaskController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/update', function() {

	OrderStatus::dispatch(new Order(5));
});
