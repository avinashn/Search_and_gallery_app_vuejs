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

use Illuminate\Http\Request;
use App\Data;
Route::get('/', function () {
    return view('welcome');
});
Route::post('/vueitems', function(Request $req){
   $posts = new Data();
   $posts->title  = $req->title;
   $posts->link  = $req->link;
   $posts->image  = $req->image;
   $posts->save();
});
Route::get('/vueitems',function(){
  $posts = Data::all();
  return $posts;
});
