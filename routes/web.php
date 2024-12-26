<?php

use App\Livewire\Article;
use App\Livewire\Home;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class);
Route::get('/articles/{article:slug}', Article::class);
