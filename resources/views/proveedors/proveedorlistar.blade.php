

@extends('layouts.template')
@section('title','Listado Cliente')
@section('content')

<div class="panel-header bg-primary-gradient">

	<table class="table table-head-bg-primary mt-4">
		
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">First</th>
				<th scope="col">Last</th>
				<th scope="col">Handle</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>1</td>
				<td>Mark</td>
				<td>Otto</td>
				<td>@mdo</td>
			</tr>
			<tr>
				<td>2</td>
				<td>Jacob</td>
				<td>Thornton</td>
				<td>@fat</td>
			</tr>
			<tr>
				<td>3</td>
				<td colspan="2">Larry the Bird</td>
				<td>@twitter</td>
			</tr>
		</tbody>
	</table>
</div>
<a href="{{route('clientes.create')}}">Crear nuevo</a>
					<div class="page-inner py-5">
				
						<table class="table table-head-bg-success">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Nombre</th>
									<th scope="col">Cedula</th>
									<th scope="col">Direccion</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($clientes as $cliente)
								<tr>
									<td><a href="{{route('clientes.editar',$cliente)}}">{{$cliente->id}}</a></td>
									<td>{{$cliente->name}}</td>
									<td>{{$cliente->cedula}}</td>
									<td>{{$cliente->direccion}}</td>
									
								</tr>
								@endforeach
								
							</tbody>
							{{$clientes->links()}}
						</table>
						
							
				</div>
			
@endsection
