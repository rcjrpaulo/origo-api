<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cliente\StoreClienteRequest;
use App\Http\Requests\Cliente\UpdateClienteRequest;
use App\Models\Cliente;

class ClienteController extends Controller
{
    public function index()
    {
        return response()->json(Cliente::all());
    }

    public function store(StoreClienteRequest $request)
    {
        $cliente = Cliente::create($request->validated());

        $cliente->planos()->sync($request->planos ?? []);

        return response()->json($cliente);
    }


    public function show(Cliente $cliente)
    {
        return response()->json($cliente);
    }

    public function update(UpdateClienteRequest $request, Cliente $cliente)
    {
        $cliente->update($request->validated());

        $cliente->planos()->sync($request->planos ?? []);

        return response()->json($cliente);
    }

    public function destroy(Cliente $cliente)
    {
        if ($cliente->cannotDelete) {
            return response()->json('Impossible to delete client with Free plan from SP State.', 403);
        }

        $cliente->delete();

        return response()->json(null, 204);
    }
}
