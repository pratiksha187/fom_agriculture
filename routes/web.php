<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/download-brochure', function () {
    $file = asset('pdf/Brochure.pdf');
    return Response::download($file, 'Foothills-Brochure.pdf');
});

// Route::get('/', function () {
//     return view('home');
// });