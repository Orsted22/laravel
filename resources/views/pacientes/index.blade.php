@extends('principal')

@section('contenido')
<div class="card">
        <div class="card-header">
          <h3 class="card-title">Pacientes</h3>
         <br>
          <a href="{{ url('/pacientes/crear') }}" title="Crear"  class="btn btn-primary">
              Crear
          </a>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 2%">
                          Id
                      </th>
                      <th style="width: 20%">
                          Documento
                      </th>
                      <th style="width: 20%">
                          Tipo de documento
                      </th>
                      <th style="width: 20%">
                          Nombres
                      </th>
                      <th style="width: 20%">
                          Apellidos
                      </th>
                      <th style="width: 20%">
                          Direccion
                      </th>
                      <th style="width: 20%">
                          Telefono
                      </th>
                      <th style="width: 20%">
                          Genero
                      </th>
                      <th style="width: 20%">
                          Fecha de nacimiento
                      </th>
                      <th style="width: 40%">
                          Estado civil
                      </th>
                      <th style="width: 30%">Acciones
                      </th>
                  </tr>
              </thead>
              <tbody>
                @foreach($pacientes as $paciente)
                  <tr>
                      <td>
                          {{ $paciente->id }}
                      </td>
                      <td>
                          {{ $paciente->documento }}
                      </td>
                      <td>
                          {{ $paciente->tipoDocumento }}
                      </td>
                      <td>
                          {{ $paciente->nombres }}
                      </td>
                      <td>
                          {{ $paciente->apellidos }}
                      </td>
                      <td>
                          {{ $paciente->direccion }}
                      </td>
                      <td>
                          {{ $paciente->telefono }}
                      </td>
                      <td>
                          {{ $paciente->genero }}
                      </td>
                      <td>
                          {{ $paciente->fechaNacimiento }}
                      </td>
                      <td>
                          {{ $paciente->estadoCivil }}
                      </td>

                      <td class="project-actions text-right">
                        <form action="{{ url('/pacientes/eliminar', $paciente) }}" method="POST">
                          <a class="btn btn-info btn-sm" href="{{ url('/pacientes/editar', $paciente->id) }}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Editar
                          </a>
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i>Eliminar</button>
                        </form>
                      </td>
                  </tr>
                @endforeach
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
@endsection