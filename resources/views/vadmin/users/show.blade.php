@extends('layouts.vadmin.main')

@section('title', 'Vadmin | Creación de Usuario')

@section('content')

    <div class="row">
        @component('vadmin.components.container')
            @slot('title', 'Perfil de Usuario')
            @slot('content')
            {{--     <b>Nombre de Usuario:</b> {{ $item->name }} <br>
                <b>E-Mail:</b> {{ $item->email }} <br>
                <b>Rol:</b> {{ roleTrd($item->role) }} <br>
                <b>Grupo:</b> {{ groupTrd($item->group) }} <br>
            --}}
            
            <div class="narrow-card">
                <div class="inner">
                    <div class="image">
                        @if($item->avatar == '')
                            <img class="image" src="{{ asset('images/users/default.jpg') }}" alt="Card image cap">
                        @else	
                            <img class="image" src="{{ asset('images/users/'.$item->avatar) }}" alt="Card image cap">
                        @endif
                    </div>
                    <div class="card-content">
                        <span><b>Nombre de Usuario:</b> {{ $item->name }} </span><br>
                        <span><b>E-Mail:</b> {{ $item->email }}  </span><br><br>
                        <span class="tag tag-pill btnBlue"><b>Rol:</b> {{ roleTrd($item->role) }}  </span> 
                        <span class="tag tag-pill btnGreen"><b>Grupo:</b> {{ groupTrd($item->group) }}  </span> 
                        
                    </div>
                </div>
              
            </div>
            @endslot

        @endcomponent
    </div>

@endsection



@section('custom_js')
	
	<script>
	</script>

@endsection