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
Route::get('/user/{id}', function ($id) {
    return "Id:".$id; 
})->name("user.prifile");


Route::get('/post/{slug}', function ($slg) {
    return "post: ".$slg; 
})->name("blog.post");

Route::get('/category/{category}', function ($category) {
    return "A categoria do produto é ". $category;
})->name("blog.category");

Route::get('/user/{id}/language/{lang?}', function ($id, $lang="português") {
        return "Id: " .$id. " e idioma : " .$lang; 
    })->name("user.profile.language");


Route::get('/products/{category}/{minPrice?}', function ($category, $minPrice=null) {
    $produtos = [
        ['titulo' => 'celular', 'preco' => 4050, 'categoria' => 'tecnologia'],
        ['titulo' => 'notebook', 'preco' => 4000, 'categoria' => 'tecnologia'],
        ['titulo' => 'cama', 'preco' => 500, 'categoria'=>'lazer']];
    foreach($produtos as $produto) {
        if($minPrice >= $produto['preco'] && $produto['categoria']==$category)
        { 
            $pesquisa[] = $produto['titulo']; 
        }
        else if($minPrice == null)
        {
            if($produto["categoria"] == $category)
             { 
                $pesquisa[] = $produto['titulo']; 
            }
        }
    }
    return $pesquisa;
})->name("products.category.price");


Route::get('/page/{page}', function ($page) {
    return "Página: ". $page;
})->name("page.number")->where("page", "[0-9]+");



Route::get('/convert/{currency}', function ($currency) {
    $dolar = $currency / 4.87;
    return $dolar. " dolares.";
})->name("currency.converter")->where("currency", "[0.1-9.9]+");



Route::get('/sum/{number1}/{number2}', function ($number1, $number2) {
    $soma = $number1 + $number2;
    return $soma;
})->name("sum.numbers")->where("currency", "[0.1-9.9]+");
