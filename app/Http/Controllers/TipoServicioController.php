<?php

namespace App\Http\Controllers;

use App\Models\TipoServicio;
use Illuminate\Http\Request;

class TipoServicioController extends Controller
{
    // GET /api/tipo-servicio
   public function index()
{
    $tipos = TipoServicio::all();

    return response()->json($tipos, 200);
}

    // GET /api/tipo-servicio/{id}
    public function show($id)
    {
        $tipo = TipoServicio::find($id);

        if (!$tipo) {
            return response()->json([
                'message' => 'Tipo de servicio no encontrado'
            ], 404);
        }

        return response()->json($tipo, 200);
    }

    // POST /api/tipo-servicio
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'activo' => 'boolean'
        ]);

        $tipo = TipoServicio::create([
            'nombre' => $request->nombre,
            'activo' => $request->activo ?? true
        ]);

        return response()->json([
            'message' => 'Tipo de servicio creado correctamente',
            'data' => $tipo
        ], 201);
    }

    // PUT /api/tipo-servicio/{id}
    public function update(Request $request, $id)
    {
        $tipo = TipoServicio::find($id);

        if (!$tipo) {
            return response()->json([
                'message' => 'Tipo de servicio no encontrado'
            ], 404);
        }

        $request->validate([
            'nombre' => 'sometimes|string|max:255',
            'activo' => 'sometimes|boolean'
        ]);

        $tipo->update($request->only(['nombre', 'activo']));

        return response()->json([
            'message' => 'Tipo de servicio actualizado correctamente',
            'data' => $tipo
        ], 200);
    }

    // DELETE /api/tipo-servicio/{id}
    public function destroy($id)
    {
        $tipo = TipoServicio::find($id);

        if (!$tipo) {
            return response()->json([
                'message' => 'Tipo de servicio no encontrado'
            ], 404);
        }

        $tipo->delete();

        return response()->json([
            'message' => 'Tipo de servicio eliminado correctamente'
        ], 200);
    }
}