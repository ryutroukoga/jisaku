<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DisplayController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PasswordResetController;
use Illuminate\Support\Facades\Auth;

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
Auth::routes();
//ホーム画面
Route::get('/', [DisplayController::class, 'index'])->name('home');
Route::post('/', [DisplayController::class, 'index'])->name('home');
//新規登録画面へ遷移
Route::get('/signnew', [DisplayController::class, 'signnew'])->name('sign.new');
//新規登録確認画面へ遷移
Route::post('/signcheck', [RegistrationController::class, 'signcheck'])->name('sign.check');
//確認画面からホーム画面（DB保存）
Route::post('/sign', [RegistrationController::class, 'sign'])->name('sign');
//パスワード再設定
// パスワードリセットリクエストを表示するGETルート
Route::get('/password/reset', [DisplayController::class, 'passwordreset'])->name('password.reset');
// パスワードリセットリンクをメールで送信するPOSTルート
Route::post('/password/reset', [DisplayController::class, 'sendResetLink'])->name('reset.mail');
// パスワード変更フォームを表示するGETルート
Route::get('/password/reset/{token}', [DisplayController::class, 'showResetForm'])->name('password.reset.token');
// パスワード変更を処理するPOSTルート
Route::post('/password/reset/{token}', [DisplayController::class, 'resetPassword'])->name('password.update');

//下記をコメントアウトするとホームから詳細画面へ遷移できる
Route::group(['middleware' => 'auth'], function () {
    Route::post('/mypage', [DisplayController::class, 'mypage'])->name('mypage');
    //ポスト詳細画面
    Route::get('/post/{id}/detail', [DisplayController::class, 'postall'])->name('post.all');
    //詳細から違反報告
    Route::get('/post/{id}/danger', [DisplayController::class, 'dangerpost'])->name('danger.post');
    //違反報告画面からホーム画面（DB登録）
    Route::post('/post/danger2', [RegistrationController::class, 'dangerpost2'])->name('danger.post2');
    //詳細から戻るボタン
    Route::get('/request/{id}/post', [DisplayController::class, 'request'])->name('request.post');
    //依頼申請から確認画面
    Route::post('/request/check', [RegistrationController::class, 'requestcheck'])->name('request.check');
    //確認画面からホーム画面（DB保存）
    Route::post('/request', [RegistrationController::class, 'request'])->name('request');
    //ログアウト
    // Route::post('/logout', [DisplayController::class, 'logout'])->name('logout');
    //マイページへ
    Route::get('/mypage', [RegistrationController::class, 'mypage'])->name('mypage');
    // ユーザーの編集遷移・登録
    Route::get('/useredit', [RegistrationController::class, 'useredit'])->name('user.edit');
    Route::post('/usere/update', [RegistrationController::class, 'userupdate'])->name('user.update');
    //ログイン誘導
    Route::get('/logingo', [DisplayController::class, 'logingo'])->name('logingo');
});

// // ユーザーの退会画面遷移・退会機能
// Route::get('/user/delete', [DisplayController::class, 'userdeleteconfirm'])->name('user.delete');
// Route::post('/user/delete', [RegistrationController::class, 'userdelete'])->name('user.delete');
// // Route::resource('users', UserController::class);
// //退会ボタンでマイページへ
// Route::post('/mypage', [RegistrationController::class, 'deletemypage'])->name('delete.mypage');

