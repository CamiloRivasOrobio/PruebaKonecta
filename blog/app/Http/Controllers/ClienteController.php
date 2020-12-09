<?php

namespace App\Http\Controllers;

use App\Model\Clientes;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\VarDumper\Cloner\Data;

class ClienteController extends Controller
{
    public function Validator(array $php)
    {
        // Validator::make($php,
        // [
        //     'nombre' => 'required',
        //     'documento' => 'required',
        //     'email' => 'required',
        //     'direccion' => 'required'
        // ]);
    }
    public function create(Request $php)
    {
        try {
            Clientes::create([
                'nombre' => $php['nombre'],
                'documento' => $php['documento'],
                'email' => $php['email'],
                'direccion' => $php['direccion'],
            ]);
            return redirect()->back();
        } catch (\Exception $error) {
            return $error;
        }
    }
    public function delete($id){
        try{
            Clientes::where('id', $id)->delete();
            return redirect()->back();
        } catch(\Exception $error){
            return $error;
        }
    }
    public function editar(Request $request, $id){
        try{
            Clientes::where('id', $id)->update([
                'nombre' => $request->get('nombre'),
                'documento' => $request->get('documento'),
                'email' => $request->get('email'),
                'direccion' => $request->get('direccion'),
            ]);
            return redirect()->back();
        } catch(\Exception $error){
            return $error;
        }
    }
}
