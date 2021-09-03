<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

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

Route::get('/', [ArticleController::class, 'index'])->name('homepage');

Route::get('/nuovo-articolo', [ArticleController::class, 'create'])->name('newArticle');

Route::post('/', [ArticleController::class, 'store'])->name('saveArticle');

Route::get('/my-articles', [ArticleController::class, 'getMyArticlesPage'])->name('myArticles');

Route::get('/article/{article}', [ArticleController::class, 'show'])->name('showArticle');

Route::get('/edit/{article}', [ArticleController::class, 'edit'])->name('editArticle');

Route::put('/update/{article}', [ArticleController::class, 'update'])->name('updateArticle');

Route::delete('/delete/{article}', [ArticleController::class, 'destroy'])->name('deleteArticle');