<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Http\Requests\ClienteRequest;

class ClienteController extends Controller
{
    public function store(ClienteRequest $request)
    {
        $cliente = Cliente::create($request->validated());

        return response()->json([
            'message' => 'Cliente registrado'
        ], 201);
    }
}