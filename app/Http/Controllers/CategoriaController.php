<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //Listar los datos
    {
        $pacientes = Paciente::all(); //Obtener todas las categorías
        return view('pacientes.index')
        ->with('pacientes',$pacientes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()//Desplegar la vista para registrar
    {
        return view('pacientes/registrar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)//Método para insertar en la tabla
    {
        //Llevar los valores de las campos del formulario a un modelo
        $categoria = new Paciente([
        'nombre' => $request->get('nombre'),
        'descripcion' => $request->get('descripcion')
        ]);
    
        $categoria->save(); //Guarda en la tabla de la base de datos.
        return redirect('/pacientes')
        ->with('success','El producto ha sido guardado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Visualizar la vista editar
         //Consultar por un id con eloquent
        $categoria = Paciente::findOrFail($id);
        return view('paciente/editar',compact('paciente')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Buscar el registro a editar
        $categoria = Paciente::findOrFail($id); //Consultar el registro a editar

        //Actualizar los datos en el modelo
        $categoria->nombre = $request->nombre;
        $categoria->descripcion = $request->descripcion;

        //Actualizar en la  base de datos.
        $categoria->update();

        //Redirigir hacia el método index del controlador(Listar)
        return redirect('paciente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paciente $paciente)
    {
        //Borrar definitivamente el registro
        $paciente->delete();
        return redirect('/pacientes');
    }
}
