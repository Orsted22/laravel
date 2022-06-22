<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pacientes;

class PacientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = Pacientes::all(); //Obtener todas las categorías
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
        $paciente = new Pacientes([
        'documento' => $request->get('documento'),
        'tipoDocumento' => $request->get('tipoDocumento'),
        'nombres' => $request->get('nombres'),
        'apellidos' => $request->get('apellidos'),
        'direccion' => $request->get('direccion'),
        'telefono' => $request->get('telefono'),
        'genero' => $request->get('genero'),
        'fechaNacimiento' => $request->get('fechaNacimiento'),
        'estadoCivil' => $request->get('estadoCivil')
        ]);
    
        $paciente->save(); //Guarda en la tabla de la base de datos.
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
        $paciente = Pacientes::findOrFail($id);
        return view('pacientes/editar',compact('paciente')); 
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
        $paciente = Pacientes::findOrFail($id); //Consultar el registro a editar

        //Actualizar los datos en el modelo
        $paciente->documento = $request->documento;
        $paciente->tipoDocumento = $request->tipoDocumento;
        $paciente->nombres = $request->nombres;
        $paciente->apellidos = $request->apellidos;
        $paciente->direccion = $request->direccion;
        $paciente->telefono = $request->telefono;
        $paciente->genero = $request->genero;
        $paciente->fechaNacimiento = $request->fechaNacimiento;
        $paciente->estadoCivil = $request->estadoCivil;

        //Actualizar en la  base de datos.
        $paciente->update();

        //Redirigir hacia el método index del controlador(Listar)
        return redirect('/pacientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pacientes $paciente)
    {
        //Borrar definitivamente el registro
        $paciente->delete();
        return redirect('/pacientes');
    }
}
