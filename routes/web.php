<?php

use App\Product;
use Illuminate\Http\Request;

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

// Route::post('/search', function(Request $request){
//     $data = Product::select("name")
//         ->where("name","LIKE","%{$request->input('query')}%")
//         ->get();
//     return response()->json($data);
// })->name('searchresult');

Route::resource('products', 'ProductsController');
