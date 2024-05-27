@extends('layouts.plantilla')
@section('title','Formulario agregar movimiento')
@section('content')
    <h1>Cerar movimiento</h1>
    <section>
        <form action="{{route('movements.store')}}" method="POST">
            @include('movements.form')
        </form>
    </section>
@endsection