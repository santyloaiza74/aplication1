@extends('layouts.plantilla')
@section('title', 'Index Productos')
@section('content')
    <h1>Productos</h1>
    <a href="{{route('products.create')}}">Crear Producto</a>
    <section>
        <form action="{{route('products.search')}}" method="POST">
            @csrf
            <label for="search">Buscar Producto
                <input type="text" name="search" id="search" value="{{old('search', $search)}}">
            </label>
            <button>Buscar</button>
        </form>
    </section>
    <section>
        @foreach ($products as $product)
            <article>
                <h3>{{$product->name}}</h3>
                <p><strong>Cantidad: </strong>{{$product->ammount}}</p>
                <a href="{{route('products.create', $product)}}">Editar</a>
                <form action="{{route('products.destroy', $product)}}" method="POST">
                    @method('delete')
                    @csrf
                    <button>Borrar</button>
                </form>
            </article>
        @endforeach
    </section>
@endsection