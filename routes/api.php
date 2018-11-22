<?php
ini_set('max_execution_time', 0);
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

#created  controller along with resources to check 
#cmd: php artisan route:list
Route::resources([
    'scan' => 'Api\ScanTaskController',
]);


#not in use
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->get('/api/scandocs', 'ScanDocumentController@index');
