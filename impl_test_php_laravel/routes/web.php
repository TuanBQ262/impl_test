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

Route::get('/', function () {
    return redirect('/dashboard');
});
Route::get('/login','GithubLoginController@getLogin')->name('login');
Route::get('/logout','GithubLoginController@getLogout')->name('logout');
Route::get('/login/callback','GithubLoginController@callback');

Route::get('/dashboard','DashboardController@getDashboard')->name('dashboard');
Route::get('/search/clone/{owner}/{repos_name}','SearchController@clone_repos')->name('clone-repos');
Route::get('/search/{search_key}/{per_page}','SearchController@getSearch')->name('search');
Route::get('/repos-save','ReposSaveController@getReposSaveList')->name('repos-save');
Route::get('/repos-fork/{owner}/{repo}','ReposSaveController@ForkReposEvent')->name('repos-fork');



Route::get('/home', 'HomeController@index')->name('home');
