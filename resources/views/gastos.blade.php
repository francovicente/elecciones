@extends('layouts.app')

@section('title', 'Buscar')

@section('sidebar')
    @parent
@endsection

@section('content')
		<h1>Confirmados</h1>
		 @if( ! empty($users))
            <table class="table">
                <thead>
                    <tr>
                        <th>Cédula</th>
                        <th>Nombre</th>
                        <th>Fecha y Hora</th>
                    </tr>
                </thead>
                <tbody>
                    	@foreach ($users as $user)
                        <tr>
                            <td>{{ floor($user->cedula) }}</td>
                           	<td>{{{ isset($user->nombre) ? $user->nombre : '' }}}</td>
                            <td>{{ $user->fecha_pago }}</td>    
                        </tr>
                        @endforeach
                </tbody>
            </table>
        @endif

@endsection
