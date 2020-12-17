<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\a_homeController;
use App\Http\Controllers\CkeditorController;
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
    return view('home');
});

// dashboard
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $aa = [
        'g'  => 'welcome',
        'aa' => 'hehe'

    ];

    return view('a_home', $aa);
})->name('dashboard');

// controller dashboard
// Route::get('/dashboard', [a_homeController::class, 'index']);
Route::get('/admin/post', [a_homeController::class, 'post'])->name('admin.post');
Route::get('/admin/post/detail/{id}', [a_homeController::class, 'detailPost']);
Route::get('/admin/category', [a_homeController::class, 'category']);

//yg benar
Route::post('/admin/post/addPost', [a_homeController::class, 'addPost'])->name('admin.post.add');

// yg salah
// Route::post('/admin/post/addPost', [a_homeController::class, 'tambahPost']);

Route::post('/admin/post/add', [a_homeController::class, 'add']);

Route::get('/admin/post/delete', [a_homeController::class, 'delete']);

//member controller
use App\Http\Controllers\memberController;
Route::get('/member', [memberController::class , 'dashboard']);

Route::get('/iseng', function () {
    return view('iseng');
});

//upload img ck editor
Route::post('ckeditor/upload', 'CKEditorController@upload')->name('ckeditor.image-upload');
