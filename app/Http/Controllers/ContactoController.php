<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacto;
use App\Models\Directorio;

class ContactoController extends Controller
{
    //
    public function index($codigo)
    {
        $contactos = Contacto::where('codigoEntrada', $codigo)->get();
        //$directorio = Directorio::find('$codigo');
        
        return view('vercontactos', compact('contactos'));
    }

    public function agregar()
    {      
        
        return view('agregarcontacto');
    }
}
