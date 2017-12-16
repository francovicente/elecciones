@extends('layouts.app')

@section('title', 'Buscar')

@section('sidebar')
    @parent
@endsection

@section('content')
		<h1 class="texto-rojo">Busqueda</h1>
		<div class="row">
			<form action="/buscar_p" method="POST" class="form-inline">
			 {{ csrf_field() }}
			<div class="form-group">
				<label class="sr-only" for="cedula">Ingrese cedula</label>
				<input type="cedula" class="form-control mb-2 mr-sm-2 mb-sm-0" id="cedula" name="cedula" placeholder="Ingresar ci">

			</div>
  			<button type="submit" class="btn btn-danger">Buscar</button>
			</form>	
		</div>
 		
			
		@if( ! empty($user))
			<div class="row">
				<table class="table custom-table">
		    	<thead>
		      		<tr>
		      			<th>Accion</th>
		        		<th>Cédula</th>
		        		<th>Nombre y Apellido</th>
		      		</tr>
		    	</thead>
		    	<tbody>
		    		
	    				<tr>
	    					<td>
	    						<div>
									<form action="/pagar" method="POST">
										{{ csrf_field() }}
										<input type="hidden" name="cedula" value="{{ floor($user->NUMERO_CED) }}" />
										<input type="hidden" name="persona" value="{{ $user->NOMBRE . ' ' .  $user->APELLIDO }}" />
				  						<button type="submit" class="btn btn-danger">Confirmar</button>	
				  					</form>
								</div>
							</td>
		      				<td><span class="text-table">{{ floor($user->NUMERO_CED) }}</span></td>
		      				<td><span class="text-table">{{ $user->NOMBRE . ' ' .  $user->APELLIDO }}</span></td>
		      			</tr>
		    	</tbody>
		  		</table>	
			</div>
			
		@endif
		<h1 style="color:red">{{{ isset($error) ? $error : '' }}}</h1>
		<h1 style="color:red">{{{ isset($success) ? $success : '' }}}</h1>
@endsection