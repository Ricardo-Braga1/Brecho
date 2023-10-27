<?php

use App\Http\Controllers\LojaController;

use App\Http\Controllers\ratings;

use Illuminate\Support\Facades\Route;

use App\http\Controllers\HomeController;

use App\http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
route::get('/',[HomeController::class,'index']); 

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    
});

route::get('/redirect',[HomeController::class,'redirect'])->middleware('auth:sanctum','verified');


route::get('/view_category',[AdminController::class,'view_category']);

route::post('/adicionar_category',[AdminController::class,'adicionar_category']);

route::get('/delete_category/{id}',[AdminController::class,'delete_category']);




route::get('/view_product',[LojaController::class,'view_product']);

route::post('/adicionar_produto',[LojaController::class,'adicionar_produto']);

route::get('/show',[LojaController::class,'show']);

route::get('/order', [LojaController::class, 'order']);

route::get('/delete_product/{id}',[LojaController::class,'delete_product']);

route::get('/update_product/{id}',[LojaController::class,'update_product']);

route::post('/editar_produto_confirmar/{id}',[LojaController::class,'editar_produto_confirmar']);

route::get('/search', [LojaController::class, 'search_order']);

route::get('/enviado/{id}',[LojaController::class,'enviado']);

route::get('/perfil', [LojaController::class, 'perfil']);


route::post('/editar_perfil', [LojaController::class, 'editar_perfil']);



route::get('/ircompra', [HomeController::class, 'ircompra']);

route::get('/detalhes_produto/{id}',[HomeController::class,'detalhes_produto']);

route::post('/adicionar_carrinho/{id}',[HomeController::class,'adicionar_carrinho']); 

route::get('/show_cart',[HomeController::class,'show_cart']);

route::get('/remove_cart/{id}',[HomeController::class,'remove_cart']);

route::get('/stripe/{totalprice}',[HomeController::class,'stripe']);

route::post('/stripe/{totalprice}', [HomeController::class, 'stripePost'])->name('stripe.post');

route::get('/product_search', [HomeController::class, 'product_search']);

route::get('/products', [HomeController::class, 'product']);


route::get('/sobre', [HomeController::class, 'sobre']);

route::get('/order2', [HomeController::class, 'order2']);

route::get('/detalhes_compra/{id}', [HomeController::class, 'detalhes_compra']);

route::post('/addRating', [ratings::class, 'addRating']);

route::get('/all_lojas', [HomeController::class, 'all_lojas']);

route::get('/loja/{id}', [HomeController::class, 'loja']);