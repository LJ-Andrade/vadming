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
	<div class="row">
		<div class="col-xs-4 list-actions">
			<a href="{{ route('users.create') }}" class="btn btnBlue">Nuevo Usuario</a>
		</div>
		<div class="col-md-8" style="text-align: right">
			<a href="{{ route('users.create') }}" class="btn btnGreen"><i class="icon-pencil2"></i></a>
			<a href="{{ route('users.create') }}" class="btn btnRed"><i class="icon-bin2"></i></a>
		
		</div>
		<div class="col-xs-12">
			@component('vadmin.components.list')
				@slot('title', 'Listado de Usuarios')
				@slot('tableTitles')
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
							<td scope="row">{{ $user->name }}</td>
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
				<tr>{!! $users->render(); !!}</tr>
		</div>
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