<?php

namespace App\Http\Controllers;

use App\Models\Limpieza;
use Illuminate\Http\Request;

class LimpiezaController extends Controller
{
public function getLimpieza(){
    $limpieza = Limpieza::with('personal')->get();
    return response()->json($limpieza);
}
}
