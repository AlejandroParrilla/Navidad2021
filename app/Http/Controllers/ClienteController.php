<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Producto;
use Illuminate\Http\Request;
use PDF;
use App\Rules\dni;
use App\Mail\ContactanosMail;
use Illuminate\Support\Facades\Mail;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function qr(Cliente $clientes){
		return view("clientes.qr",compact("clientes"));
	}
    
    public function enviaremail(Cliente $clientes){
        $correo= new ContactanosMail;
        Mail::to('alejandroglp20@gmail.com')->send($correo);
        return redirect('/clientes');
   }
	public function listadoPdf(){
		 $clientes=Cliente::orderBy("id")->limit(100)->get();
		 $pdf = PDF::loadView('clientes.pdf',compact("clientes"));
		 return $pdf->download('clientes.pdf');		
	}
    public function index()
    {
        $clientes=Cliente::orderBy("id")->get();
        return view("clientes.index",compact("clientes"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("clientes.create");
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
			'direccion' => 'required',
			'telefono' => 'required',
			'dni' => 'required',
		]);

        $datos=$request->all();
		Cliente::create($datos);
        return redirect("/clientes");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        $productos=Producto::all();
        return view("clientes.show",compact("cliente","productos"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        return view("clientes.create",compact("cliente"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        $validated = $request->validate([
			'nombre' => 'required',
			'direccion' => 'required',
			'telefono' => 'required',
			'dni' => new dni,
		]);
        $datos=$request->all();
		$cliente->fill($datos);
		$cliente->save();
		return redirect("/clientes");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
    }
}
