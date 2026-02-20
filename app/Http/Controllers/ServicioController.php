<?php

namespace App\Http\Controllers;
use App\Models\Servicio;
use App\Http\Requests\ServicioRequest;
use App\Http\Resources\ServicioResource;
use App\ApiResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    use ApiResponse;
    public function index()
    {
        $servicios = Servicio::all();
        return $this->apiResponse($servicios, 'Servicios obtenidos correctamente');
    }

    public function create()
    {

    }

    public function store(ServicioRequest $request)
    {
        $data= $request->validated();

        if($request->hasFile('imagen')){
            $data['imagen']=$request->file('imagen')->store('servicos', 'public');
        }
        $servicio=Servicio::create($data);

        return $this->apiResponse(new ServicioResource($servicio), 'Servicio creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Servicio $servicio)
    {
        return $this->apiResponse(new ServicioResource($servicio), 'Servicio obtenido correctamente');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServicioRequest $request, Servicio $servicio)
    {
        $data= $request->validated();

        if($request->hasFile('imagen')){
            if($servicio->imagen){
                Storage::disk('public')->delete($servicio->imagen);
            }
            $data['imagen']=$request->file('imagen')->store('servicos', 'public');
        }
        $servicio->update($data);
        return $this->apiResponse(new ServicioResource($servicio), 'Servicio actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Servicio $servicio)
    {
        if($servicio->imagen){
            Storage::disk('public')->delete($servicio->imagen);
        }
        $servicio->delete();
        return $this->apiResponse(null, 'Servicio eliminado correctamente');
    }
}
