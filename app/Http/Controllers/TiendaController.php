<?php

namespace App\Http\Controllers;
// importo los modelos para poder usarlos 
use App\Models\Cliente;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TiendaController extends Controller
{

    // Metodo CRUD para producto 
    public function index(Request $request) {
        $productos=Producto::all();
        return View('productos.index',[
            'productos'=>$productos
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
        return View('clientes.index',[
            'clientes'=>$clientes
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
    
    

}
