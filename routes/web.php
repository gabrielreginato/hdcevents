<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

Route::get('/', [EventController::class, 'index']);

Route::get('/events/create', [EventController::class, 'create']);

Route::get('/teste', function () {
    $nome = 'nome1';

    return view('teste', ['nome' => $nome]);
});

Route::get('/produtos/{id?}', function ($id = 1) {
    return view('produto', ['id' => $id]);
});

Route::get('/busca/{id?}', function ($id = 1) {
    $busca = request('search');

    return view('produtos_pesquisa', ['busca' => $busca]);
});
