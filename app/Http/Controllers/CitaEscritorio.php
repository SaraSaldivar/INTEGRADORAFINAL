<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;
use App\Http\Resources\CitaResource;
use App\Models\Cliente;
use App\Models\Detalle_Cita;
use App\Models\Esp_Per;
use App\Models\Personal;
use App\Models\Servicio;
use App\Models\Galeria;
use Illuminate\Support\Facades\Storage;


class CitaEscritorio extends Controller
{
    public function index() {
        return $this->apiResponse(CitaResource::collection(Cita::all()), 'Citas regresadas', 200);
    }

    public function store() {

        $data = $request->validated();
        $cita = Cita::create($data);
        return $this->apiResponse(new CitaResource($cita), 'Cita creada', 201);
    }

    public function show ($id) {
        

        $cita = Cita::with(['cliennte', 'personal', 'servicio'])->find($id);
        if($id) {
            return $this->apiResponse(new CitaResource($id), 'Cita regresada', 200);
        } else {
            return $this->apiResponse(null, 'Cita no encontrada', 404);

        }
    }

    public function update($id) {
        $cita = Cita::find($id);
        if($cita) {
            $data = $request->validated();
            $cita->update($data);
            return $this->apiResponse(new CitaResource($cita), 'Cita actualizada', 200);
        } else {
            return $this->apiResponse(null, 'Cita no encontrada', 404);

        }
    }


    public function destroy($id) {
        $cita = Cita::find($id);
        if($cita) {
            $data = $request->validated();
            $cita->softdelete($data);
            return $this->apiResponse('cita borrada chido', 200);
        } else {
            return $this->apiResponse('cita no encontrada', 404);
        }
    }
}
