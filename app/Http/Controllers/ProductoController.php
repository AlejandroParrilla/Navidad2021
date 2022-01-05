<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;
use PDF;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function qr(Producto $productos){
		return view("productos.qr",compact("productos"));
	}
	public function listadoPdf(){
		 $productos=Producto::orderBy("id")->limit(100)->get();
		 $pdf = PDF::loadView('productos.pdf',compact("productos"));
		 return $pdf->download('Productos.pdf');		
	}
    public function index()
    {
        $productos=Producto::orderBy("id")->get();
        return view("productos.index",compact("productos"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias=Categoria::orderBy("id")->get();
        return view("productos.create",compact("categorias"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
			'nombre' => 'required',
			'precio' => 'required',
			'stock' => 'required',
            'categoria_id' => 'required',
		]);

        $datos=$request->all();
        if($request->hasFile('image')){
            $destination_path='public/images/productos';
            $image= $request->file('image');
            $image_name=$image->getClientOriginalName();
            $path= $request->file('image')->storeAs($destination_path,$image_name);
            $datos['image']=$image_name;
        }
		Producto::create($datos);
        return redirect("/productos");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        return view("productos.show",compact("producto"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        $categorias=Categoria::orderBy("id")->get();
        return view("productos.create",compact("producto","categorias"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        $validated = $request->validate([
			'nombre' => 'required',
			'precio' => 'required',
			'stock' => 'required',
            'categoria_id' => 'required',
		]);
        $datos=$request->all();
        if($request->hasFile('image')){
            $destination_path='public/images/productos';
            $image= $request->file('image');
            $image_name=$image->getClientOriginalName();
            $path= $request->file('image')->storeAs($destination_path,$image_name);
            $datos['image']=$image_name;
        }
		$producto->fill($datos);
		$producto->save();
		return redirect("/productos");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
    }
}
