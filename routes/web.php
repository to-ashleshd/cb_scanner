<?php
ini_set('max_execution_time', 0);
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

Route::get('/scan_documents', function () {
    return view('document_scanner');
});

Route::get('/scan', "ScanTaskController@index");
Route::get('/subjects/{class_id}/class', "ScanTaskController@getClassSubjects");
Route::post('/load_books', "ScanTaskController@getClassSubjectBooks");
Route::get('/chapters/{book_id}/books', "ScanTaskController@getChaptersByBook");

Route::post('/load_books', "ScanTaskController@getClassSubjectBooks");
Route::post('/scan_submit', "ScanTaskController@ScanDocument");
Route::post('/upload_chapter_pdf', "ScanTaskController@UploadChapterPdf");

Route::get('/view', "ScanTaskController@view");

//Route::get('/test_api', "ScanedPdfUploadController@index");

