<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
class FotoController extends Controller
{
    //
   
    public function captura()
    {
        // Lógica para mostrar una lista de fotos
        return view('captura');
    }
    

}
