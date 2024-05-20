@extends('layouts.plantilla')
@section('title','Formulario agregar producto')
@section('content')
    <h1>Crear Producto</h1>
    <form action="{{route('products.store')}}" method="POST">
        @csrf
        <div>
            <label for="sku">Sku</label>
            <input type="text" name="sku">
        </div>
        <div>
            <label for="name">Nombre</label>
            <input type="text" name="name">
        </div>
        <div>
            <label for="ammount">Ammount</label>
            <input type="text" name="ammount">
        </div>
        <div>
            <label for="unit">Unit</label>
            <input type="text" name="unit">
        </div>
        <button>Guardar</button>
    </form>    
@endsection