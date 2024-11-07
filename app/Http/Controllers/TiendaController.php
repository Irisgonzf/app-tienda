<?php

namespace App\Http\Controllers;
// importo los modelos para poder usarlos 
use App\Models\Cliente;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Asignacion;
use App\Exports\ProductosExport;
use App\Exports\ClienteExport;
use App\Exports\AsignacionExport;
use Maatwebsite\Excel\Facades\Excel;

class TiendaController extends Controller
{

    // Metodo CRUD para producto 
    public function index(Request $request) {
        $productos=Producto::all();
        $query = Producto::query();

    // Filtrar por nombre del producto
    if (isset($request->nombre) && ($request->nombre !=null)) {
        $query->where('nombre', 'like', '%' . $request->nombre . '%');
    }

    $productos = $query->get();
        return View('productos.index',[
            'productos'=>$productos,
            'buscar' => $request->nombre,
        ]);
    }
    
    //Vista de solo un elemento
    public function show($id)
    {
        $producto = Producto::find($id); 
        return view('productos.show', [
            'producto'=>$producto
        ]);
    }

    //Vista del formulario para crear y guardar un producto
    public function create() {
        return view('productos.create');
    }
    
    public function store(Request $request) {
        $producto =New Producto();
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->cantidad = $request->cantidad;
        $producto->save();
        return Redirect::to('productos');
    }

    //Vista de esditar y actualizar un producto 
    public function edit($id) {
        $producto = Producto::find($id);
        return view('productos.edit',[
            'producto'=>$producto
        ]);
    }
    
    public function update(Request $request, $id) {
        $producto=Producto::find($id);
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->cantidad = $request->cantidad;
        $producto->save();
        return Redirect::to('productos');

    }
    
    //Eliminar un producto
    public function destroy($id) {
        $producto = Producto::find($id);
        $producto->delete();
    
        return Redirect::to('productos');
    }

  




    // Metodo CRUD para cliente
    public function indexCliente(Request $request) {
        $clientes=Cliente::all();
        $query = Cliente::query();

        // Filtrar por nombre del cliente
        if (isset($request->nombre) && ($request->nombre !=null)) {
            $query->where('nombre', 'like', '%' . $request->nombre . '%');
        }
        $clientes = $query->get();

        return View('clientes.index',[
            'clientes'=>$clientes,
            'buscar'=>$request->nombre,
        ]);
    }
    
    //Vista de solo un elemento
    public function showCliente($id)
    {
        $cliente = Cliente::find($id); 
        return view('clientes.show', [
            'cliente'=>$cliente
        ]);
    }

    //Vista del formulario para crear y guardar un cliente
    public function createCliente() {
        return view('clientes.create');
    }
    
    public function storeCliente(Request $request) {
        $cliente =New Cliente();
        $cliente->nombre = $request->nombre;
        $cliente->apellidos = $request->apellidos;
        $cliente->dni = $request->dni;
        $cliente->direccion = $request->direccion;
        $cliente->telefono = $request->telefono;
        $cliente->email = $request->email;
        $cliente->save();
        return Redirect::to('clientes');
    }

    //Vista de esditar y actualizar un cliente
    public function editCliente($id) {
        $cliente = Cliente::find($id);
        return view('clientes.edit',[
            'cliente'=>$cliente
        ]);
    }
    
    public function updateCliente(Request $request, $id) {
        $cliente=Cliente::find($id);
        $cliente->nombre = $request->nombre;
        $cliente->apellidos = $request->apellidos;
        $cliente->dni = $request->dni;
        $cliente->direccion = $request->direccion;
        $cliente->telefono = $request->telefono;
        $cliente->email = $request->email;
        $cliente->save();
        return Redirect::to('clientes');

    }
    
    //Eliminar un producto
    public function destroyCliente($id) {
        $cliente = Cliente::find($id);
        $cliente->delete();
    
        return Redirect::to('clientes');
    }
    
    // Asignaciones 
    public function indexAsignaciones()
    {
        $asignaciones = Asignacion::with(['cliente', 'producto'])->get();
        return view('asignaciones.index',[
            'asignaciones'=> $asignaciones
        ]);
    }

    public function createAsignacion()
    {
        $clientes = Cliente::all();
        $productos = Producto::all();
        return view('asignaciones.create',[
            'clientes' => $clientes,
            'productos' => $productos
        ]);
    }

    public function storeAsignacion(Request $request)
    {
        $clienteId = $request->cliente_id;
        $productoId = $request->producto_id;
        $cantidad = $request->cantidad;

        $producto = Producto::find($productoId);

        // Compruebo que el producto existe
        if (!$producto) {
            return Redirect::route('asignaciones.create');
        }

        //Compruebo que el producto tiene cantidad
        if ($producto->cantidad < $cantidad) {
            return Redirect::route('asignaciones.create');
        }

        //Inserto la asignacion
        Asignacion::create([
            'cliente_id' => $request->cliente_id,
            'producto_id' => $request->producto_id,
            'cantidad' => $request->cantidad,
        ]);

        $producto->cantidad -= $cantidad; //cantidad actualizada
        $producto->save();
        return Redirect::route('asignaciones.index');
    }



    //Exportar
    public function exportProductos()
    {
        return Excel::download(new ProductosExport, 'productos.csv', \Maatwebsite\Excel\Excel::CSV);
    }
    public function exportClientes()
    {
        return Excel::download(new ClienteExport, 'clientes.csv', \Maatwebsite\Excel\Excel::CSV);
    }
    public function exportAsignaciones()
    {
        return Excel::download(new AsignacionExport, 'asignaciones.csv', \Maatwebsite\Excel\Excel::CSV);
    }


}
