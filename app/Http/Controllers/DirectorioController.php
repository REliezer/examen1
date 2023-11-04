<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Directorio;
use App\Models\Contacto;


class DirectorioController extends Controller
{
    //
    public function index()
    {
        $directorios = Directorio::all();
        return view('directorio', compact('directorios'));
    }

    public function nueva()
    {
        return view('crearEntrada');
    }

    public function buscar()
    {
        return view('buscar');
    }

    public function eliminar($codigo)
    {
        $directorio = Directorio::find($codigo);
        return view('eliminar', compact('directorio'));
    }

    public function destroy($codigo)
    {
        $contactos = Contacto::where('codigoEntrada', $codigo)->get();
        foreach ($contactos as $contacto) {
            $contacto->delete();
        }

        $directorio = Directorio::find($codigo);
        $directorio->delete();
        return redirect()->route('directorio.index');
    }

    public function store(Request $request){
        
        $directorio = new Directorio();
        $directorio->codigoEntrada = $request->input("codigo");
        $directorio->nombre = $request->input("nombre");
        $directorio->apellido = $request->input("apellido");
        $directorio->telefono = $request->input("telefono");
        $directorio->correo = $request->input("correo");
        
        $directorio->save();
        return redirect( route('directorio.index'));
    }

    public function search(Request $request)
    {
        $correo = $request->input("correo");
        $directorio = Directorio::find($correo);
        $codigo = $directorio->codigoEntrada;

        $contactos = Contacto::where('codigoEntrada', $codigo)->get();
        
        return view('vercontactos', compact('contactos'));
    }

}
