<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLibroRequest;
use App\Models\Libro;
use Illuminate\Http\Request;

class LibroApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libros = Libro::all();

        return response()->json([
            'status' => true,
            'libros' => $libros
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLibroRequest $request)
    {
        $libro = Libro::create($request->all());

        return response()->json([
            'status' => true,
            'message' => "Libro creado con éxito.",
            'libro' => $libro
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $libro = Libro::find($id);

        return response()->json([
            'status' => true,
            'libro' => $libro
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreLibroRequest $request, $id)
    {
        $libro = Libro::find($id);
        $libro->update($request->all());

        return response()->json([
            'status' => true,
            'message' => "Libro actualizado con éxito.",
            'libro' => $libro
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $libro = Libro::find($id);     
        
        if($libro->deleted_at == null) {
            $libro->deleted_at = date('Y-m-d H:i:s');
            $libro->save();
            
            return response()->json([
                'status' => true,
                'message' => "Libro eliminado con éxito.",
            ], 200);
        }
        else {
            $libro->deleted_at = null;
            $libro->save();

            return response()->json([
                'status' => true,
                'message' => "Libro restaurado con éxito.",
            ], 200);
        }                        
    }
}
