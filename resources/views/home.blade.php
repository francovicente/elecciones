@extends('layouts.app')

@section('title', 'Buscar')

@section('sidebar')
    @parent
@endsection

@section('content')
    @guest
        
         <div class="row bg-faded custom-image">
        <div class="col-4 mx-auto text-center">
            <img src="{{ asset('img/logo_home.png') }}"> <!-- center this image within the column -->
            
        </div>
    </div>
    @else
    <h1>Busqueda</h1>
        <div class="row">
            <form action="/buscar" method="POST" class="form-inline">
             {{ csrf_field() }}
            <div class="form-group">
                <label class="sr-only" for="cedula">Ingrese cedula</label>
                <input type="cedula" class="form-control mb-2 mr-sm-2 mb-sm-0" id="cedula" name="cedula" placeholder="Ingresar ci">

            </div>
            <button type="submit" class="btn btn-danger">Buscar</button>
            </form> 
        </div>
        @if( ! empty($data))
            <table class="table">
                <thead>
                    <tr>
                        <th>Cédula</th>
                        <th>Nombre y Apellido</th>
                        <th>Local votacion</th>
                        <th>Mesa</th>
                        <th>Orden</th>
                        <th>Fec. Nac</th>
                        <th>Fec. Afiliacion</th>
                    </tr>
                </thead>
                <tbody>
                    
                        <tr>
                            <td>{{ floor($data->NUMERO_CED) }}</td>
                            <td>{{ $data->NOMBRE .' '. $data->APELLIDO }}</td>
                            <td>Esc. N° 73 PATROCINIA GONZALEZ DE FREYES</td>
                            <td>{{ $data->MESA }}</td>
                            <td>{{ floor($data->ORDEN) }}</td>
                            <td>{{ $data->FECHA_NACI }}</td>
                            <td>{{ $data->FECHA_AFIL }}</td>    
                        </tr>
                </tbody>
            </table>
        @endif

    </div>
    <!--{{{ isset($name) ? $name : '' }}}-->
        @endguest
@endsection

        