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
    return view('welcome');
});

// Route::get("/about",function(){
//     return view("about");
// });

//cara lain untuk menampilkan view
Route::view("/about","about",["nama"=>"Hisyam"]);

// Route::get("/animals/{id}",function($id){
//     return view("kumpulan.animal",["id"=>$id]);
// });

