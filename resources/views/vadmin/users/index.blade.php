@extends('layouts.vadmin.main')

{{-- PAGE TITLE --}}
@section('title', 'Vadmin | Usuarios')

{{-- STYLE INCLUDES --}}
@section('styles')
	
@endsection
{{-- CONTENT --}}
@section('content')
	@component('vadmin.components.header')
		
		@slot('left')
		    <li class="breadcrumb-item"><a href="{{ url('vadmin')}}">Inicio</a></li>
            <li class="breadcrumb-item active">Usuarios</li>
		@endslot
		@slot('right')
		@endslot
		
	@endcomponent
	<div class="row list-actions">
		{{-- Action --}}
		<div class="col-md-5 col-xs-4 col-xs-12 pad0 left">
			<a href="{{ route('users.create') }}" class="btn btnBlue"><i class="icon-plus-round"></i>  Nuevo Usuario</a>
			<button id="SearchFiltersBtn" class="btn btnGreen"><i class="icon-ios-search-strong"></i></button>
			@if(isset($_GET['name']) or isset($_GET['code']))
			<a href="{{ url('vadmin/clientes') }}"><button type="button" class="btn btnGrey">Mostrar Todos</button></a> <br><br>
    		<span class="results">Resultados de la búsqueda: </span>
			@endif
		</div>
		<div class="col-md-7 col-xs-12 pad0 right">
			<a href="{{ route('users.create') }}" class="btn btnGreen"><i class="icon-pencil2"></i></a>
			<a href="{{ route('users.create') }}" class="btn btnRed"><i class="icon-bin2"></i></a>
		</div>
	</div>
	{{-- Test --}}
	<div class="col-xs-12 TestBox test-box Hidden">
	</div>
	{{-- Search --}}
	<div class="row">
		@include('vadmin.users.searcher')
	</div>
	<div class="row">
		@component('vadmin.components.list')
			@slot('title', 'Listado de Usuarios')
			@slot('tableTitles')
				<th>Usuario</th>
				<th>Nombre</th>
				<th>Email</th>
				<th>Rol</th>
				<th>Grupo</th>
				<th>Fecha de Ingreso</th>
				<th></th>
			@endslot

			@slot('tableContent')
				@foreach($users as $user)
					<tr>
						<td scope="row"><a href="{{ url('vadmin/users/'.$user->id) }}">{{ $user->username }}</a></td>
						<td>{{ $user->name }}</td>
						<td>{{ $user->email }}</td>
						<td>{{ roleTrd($user->role) }}</td>
						<td>{{ groupTrd($user->group) }}</td>
						<td>{{ transDateT($user->created_at) }}</td>
						<td>
						<label class="custom-control custom-checkbox list-checkbox">
							<input type="checkbox" class="custom-control-input">
							<span class="custom-control-indicator"></span>
							<span class="custom-control-description"></span>
						</label>
						</td>
					</tr>						
				@endforeach
			@endslot
		@endcomponent
		{!! $users->render(); !!}
	</div>
	<div id="Error"></div>	
@endsection



{{-- SCRIPT INCLUDES --}}
@section('scripts')

@endsection

{{-- CUSTOM JS SCRIPTS--}}
@section('custom_js')

	<script>

	</script>

@endsection