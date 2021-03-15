<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cliente\StoreClienteRequest;
use App\Http\Requests\Cliente\UpdateClienteRequest;
use App\Http\Resources\ClienteCollection;
use App\Http\Resources\ClienteResource;
use App\Models\Cliente;

class ClienteController extends Controller
{
    public function index()
    {
        return new ClienteCollection(Cliente::paginate(30));
    }

    public function store(StoreClienteRequest $request)
    {
        $cliente = Cliente::create($request->validated());

        $cliente->planos()->sync($request->planos ?? []);

        return response()->json($cliente);
    }


    public function show(Cliente $cliente)
    {
        return new ClienteResource($cliente->load('planos'));
    }

    public function update(UpdateClienteRequest $request, Cliente $cliente)
    {
        $cliente->update($request->validated());

        $cliente->planos()->sync($request->planos ?? []);

        return response()->json($cliente);
    }

    public function destroy(Cliente $cliente)
    {
        if (!$cliente->podeDeletar) {
            return response()->json(['errors' => ['Impossível deletar um cliente de plano Free do estado de São Paulo']], 403);
        }

        $cliente->delete();

        return response()->json(null, 204);
    }
}
