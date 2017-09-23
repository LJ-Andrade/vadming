@extends('layouts.web.main')
@section('title', 'Web Inicio')

@section('styles')
<style>

    body { 
        padding-top: 150px;
        text-align: center
    }

</style>
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <h1>INICIO</h1>
            <br>
            <a href="{{ url('vadmin') }}"><button class="button btnBlue">Ingresar</button></a>
        </div>
    </div>

    {{-- @include('web.layouts.partials.foot') --}}


@endsection

@section('scripts')


@endsection

@section('custom_js')
<script>    

</script>
@endsection

