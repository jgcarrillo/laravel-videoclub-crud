<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Hacer uso de la clase Auth
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function getHome(){
        if(Auth::check()){
            // Redirige a un método de un controlador si está autenticado
            return redirect()->action('CatalogController@getIndex');
        } else {
            return redirect('/login');
        }
    }
}
