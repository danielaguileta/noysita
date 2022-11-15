<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ValidacionesRequest;
use App\Models\Clientes;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;



class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 
    public function index()
    {

        $clientes  = Http::get('http://localhost:9000/clientes/')->json();

    
        return view('clientes.index',compact('clientes')); 


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidacionesRequest $request)
    {
  
       /*   $clientes = Clientes::create([
          'ID_CLIENTE' => $request->id,
           'IDENTIDAD_CLIENTE'=> $request->identidad,
           'RTN_CLIENTE' => $request->rtn,
           'NOMBRE_CLIENTE' => $request->nombre,
           'DIRECCION'=> $request->direccion,
           'TIPO_PAGO' => $request->tipo_pago,
           'FECHA_INGRESO_CLIENTE' => $request->ingreso_cliente
         ]);
 */
                  $clientes = Http::post('http://localhost:9000/insertar_clientes', [
                    'IDENTIDAD_CLIENTE'=> $request->identidad,
                    'RTN_CLIENTE' => $request->rtn,
                    'NOMBRE_CLIENTE' => $request->nombre,
                    'DIRECCION'=> $request->direccion,
                    'TIPO_PAGO' => $request->tipo_pago,
                    'FECHA_INGRESO_CLIENTE' => $request->ingreso_cliente          
                ]); 


         return redirect()-> route('clientes.index')->with('agregado','El cliente fue agregado correctamente'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $COD_CLIENTE
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $COD_CLIENTE
     * @return \Illuminate\Http\Response
     */
    public function edit($COD_CLIENTE)

    {


       $clientes = Clientes::findorfail($COD_CLIENTE); 
        
        return view('clientes.edit', compact('clientes')); 

       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $COD_CLIENTE
     * @return \Illuminate\Http\Response
     */
    public function update(ValidacionesRequest $request, $COD_CLIENTE)
    {
        $clientes  = Http::put('http://localhost:9000/clientes/edit/'. $COD_CLIENTE ,[
            'IDENTIDAD_CLIENTE' => $request->identidad,
            'RTN_CLIENTE' => $request->rtn,
            'NOMBRE_CLIENTE' => $request->nombre,
            'DIRECCION'=> $request->direccion,
            'TIPO_PAGO' => $request->tipo_pago,
            'FECHA_INGRESO_CLIENTE' => $request->ingreso_cliente      
        ]);

        return redirect()-> route('clientes.index')->with('editado','El cliente fue editado correctamente'); 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $COD_CLIENTE
     * @return \Illuminate\Http\Response
     */
    public function destroy($COD_CLIENTE)
    {
           $clientes = Http::delete('http://localhost:9000/clientes/delete/'. $COD_CLIENTE);
        return redirect()-> route('clientes.index')->with('eliminado','El cliente fue eliminado correctamente'); 
    }
}
