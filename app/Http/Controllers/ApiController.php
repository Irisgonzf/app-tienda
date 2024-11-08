<?php

namespace App\Http\Controllers;
use App\Models\Producto; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    // Método para listar productos con opción de filtrado
    public function index(Request $request)
    {
        // Creación de la consulta
        $query = Producto::query();

        // Filtrar por nombre del producto 
        if ($request->has('nombre') && $request->nombre != null) {
            $query->where('nombre', 'like', '%' . $request->nombre . '%');
        }

        $productos = $query->get();

        // Verificar si hay productos
        if ($productos->isEmpty()) {
            return response()->json([
                'mensaje' => 'No se encontraron productos con ese criterio',
            ], 404);
        }

        // Devolver los productos filtrados en formato JSON
        return response()->json($productos, 200);
    }

    public function store(Request $request){
        $validar=Validator:: make($request->all(),[
            'nombre'=> 'required',
            'descripcion'=>'required|max:80',
            'cantidad'=>'required|integer',
        ]);
    
        if($validar->fails()){
            $data=[
                'mensaje'=> 'Error en la validacion de los datos',
                'errors'=> $validar->errors(),
                'status'=>400
            ];

            return response()->json($data,400);
        }
        $producto= Producto::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'cantidad' => $request->cantidad,
        ]);

        if(!$producto){
            $data=[
                'mensaje'=> 'Error al crear el producto',
                'status'=>500
            ];
            return response()->json($data,500);
        }

        $data=[
            'producto'=> $producto,
            'status'=>201
        ];

        return response()->json($data,201);
    }

    public function show($id)
    {
        $producto= Producto::find($id);

        if (!$producto)
        {
            $data=[
                'mensaje'=> 'Producto no encontrado',
                'status'=>404
            ];
            return response()->json($data,404);
        }

        $data=[
            'producto'=> $producto,
            'status'=>200
        ];

        return response()->json($data,200);

    }


    public function update( Request $request, $id){
        $producto = Producto::find($id);

        if (!$producto)
        {
            $data=[
                'mensaje'=> 'Producto no encontrado',
                'status'=>404
            ];
            return response()->json($data,404);
        }

        $validar=Validator:: make($request->all(),[
            'nombre'=> 'required',
            'descripcion'=>'required|max:80',
            'cantidad'=>'required|integer',
        ]);

        if($validar->fails()){
            $data=[
                'mensaje'=> 'Error en la validacion de los datos',
                'errors'=> $validar->errors(),
                'status'=>400
            ];

            return response()->json($data,400);
        }

        $producto->nombre = $request->nombre;
        $producto->descripcion=$request->descripcion;
        $producto->cantidad=$request->cantidad;

        $producto->save();
        $data=[
            'mensaje'=>'Producto actualizado',
            'producto'=> $producto,
            'status'=>200
        ];

        return response()->json($data,200);

    }


    public function destroy($id)
    {
        $producto= Producto::Find($id);
        
        if (!$producto)
        {
            $data=[
                'mensaje'=> 'Producto no encontrado',
                'status'=>404
            ];
            return response()->json($data,404);
        }

        $producto->delete();

        
        $data=[
            'producto'=> 'Producto eliminado',
            'status'=>200
        ];

        return response()->json($data,200);

    }
}
