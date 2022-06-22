@extends('principal')

@section('contenido')
<div class="card">
        <div class="card-header">
          <h3 class="card-title">Pacientes</h3>
         <br>
          <a href="{{ url('/pacientes/crear') }}" title="Crear"  class="btn btn-primary">
              Crear
          </a>
        </div>
        <div class="row">
            <form name="frmRegistrar" method="POST" action="{{ url('/pacientes/guardar') }}">
                @csrf
                <div class="form-group">
                    <label for="documento">Documento:</label>
                    <input type="number" id="documento" name="documento" />
                </div>
                <div class="form-group">
                    <label for="tipoDocumento">Tipo de documento:</label>
                    <input type="text" id="tipoDocumento" name="tipoDocumento" />
                </div>
                <div class="form-group">
                    <label for="nombres">Nombres:</label>
                    <input type="text" id="nombres" name="nombres" />
                </div>
                <div class="form-group">
                    <label for="apellidos">Apellidos:</label>
                    <input type="text" id="apellidos" name="apellidos" />
                </div>
                <div class="form-group">
                    <label for="direccion">Direccion:</label>
                    <input type="text" id="direccion" name="direccion" />
                </div>
                <div class="form-group">
                    <label for="telefono">Telefono:</label>
                    <input type="number" id="telefono" name="telefono" />
                </div>
                <div class="form-group">
                    <label for="genero">Genero:</label>
                    <input type="text" id="genero" name="genero" />
                </div>
                <div class="form-group">
                    <label for="fechaNacimiento">Fecha de nacimiento:</label>
                    <input type="date" id="fechaNacimiento" name="fechaNacimiento" />
                </div>
                <div class="form-group">
                    <label for="estadoCivil">Estado civil:</label>
                    <input type="text" id="estadoCivil" name="estadoCivil" />
                </div>
                <button type="submit" class="btn btn-primary">Registrar</button>
            </form>
        </div>
</div>
@endsection