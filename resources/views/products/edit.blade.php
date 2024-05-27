@extends('layouts.plantilla')
@section('title', 'Editar producto')
@section('content')
    <h1>Editar Producto</h1>
    <form action="{{route('products.update', $product)}}" method="POST">
        @method('PUT')
        @csrf
        <div>
            <label for="sku">Sku</label>
            <input type="text" name="sku" value="{{$product->sku}}">
        </div>
        <div>
            <label for="name">Nombre</label>
            <input type="text" name="name" value="{{$product->name}}">
        </div>
        <div>
            <label for="ammount">Ammount</label>
            <input type="text" name="ammount" value="{{$product->ammount}}">
        </div>
        <div>
            <label for="unit">Unit</label>
            <input type="text" name="unit" value="{{$product->unit}}">
        </div>
        <button>Editar</button>
    </form>
@endsection