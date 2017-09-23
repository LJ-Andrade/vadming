<div id="SearchFilters" class="search-filters">
    {{-- Search --}}
    {!! Form::open(['id' => 'SearchForm', 'method' => 'GET', 'url' => 'vadmin/users', 'class' => 'form-inline', 'role' => 'search']) !!} 
        <div class="form-group">
            {!! Form::label('name', 'Nombre o Email') !!} <br>  
            {!! Form::text('query', null, ['id' => 'SearchInput', 'class' => 'form-control', 'placeholder' => 'Buscar por nombre o email...', 'aria-describedby' => 'search']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('type', 'Roles') !!} <br>
            <select name="role" class="form-control">
                <option selected disabled>Seleccione un Rol</option>
                <option value="*">Todos</option>
                <option value="1">SuperAdmin</option>
                <option value="2">Admin</option>
                <option value="3">Usuario</option>
                <option value="4">Invitado</option>
            </select>
        </div>
        <div class="form-group">
            {!! Form::label('type', 'Grupo') !!} <br>
            <select name="role" class="form-control">
                <option selected disabled>Seleccione un Grupos</option>
                <option value="*">Todos</option>
                <option value="1">Miembro</option>
                <option value="2">Cliente</option>
                <option value="3">Matorísta</option>
            </select>
        </div>
        <div class="form-group">
            <a href="" id="SearchFiltersBtn" class="btnSm btnGreen actionBtn">Buscar</a>
        </div>
    {!! Form::close() !!}
    {{-- /Search --}}
    <div class="btnClose btn-close"><i class="icon-android-cancel"></i></div>		
</div>
