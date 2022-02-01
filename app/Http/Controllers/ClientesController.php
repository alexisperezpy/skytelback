<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use App\Http\Requests\StoreClientesRequest;
use App\Http\Requests\UpdateClientesRequest;


class ClientesController extends Controller
{
    
    public function index()
    {
        $clientes = Clientes::all();
        return response()->json($clientes);
    }

    
    
    public function store(StoreClientesRequest $request)
    {
        $rules=[
            'nombre' => 'required|string|min:1|max:25',
            'apellido' => 'required|string|min:1|max:25',
            'telefono' => 'required|string|min:5|max:10',
            'correo' => 'required|email|max:50|unique:clientes,correo',
        ];

        if($request->correo == 'john@smith.com'){
            return response()->json(
                [
                    'message' => 'Error!, El correo ingresado es: john@smith.com',
                    'data' => $request->all()
                ],
                400
            ); 
        }else{
            $this->validate($request, $rules);
            $cliente = Clientes::create($request->all());
           
            return response()->json(
                [
                    'message' => 'Registro exitoso',
                    'data' => $cliente
                ],
                201
            ); 
        }
    }
    
    public function show(Clientes $clientes)
    {
        //
    }

    
    public function update(UpdateClientesRequest $request, Clientes $clientes)
    {
        //
    }

    
    public function destroy(Clientes $clientes)
    {
        //
    }
}
