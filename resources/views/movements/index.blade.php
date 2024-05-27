@extends('layouts.plantilla')
@section('title', 'Listado de movimientos')
@section('content')
    @if (Session::has('error'))
        <p style="padding: 10px; background-color: red; color: white;">
            {{Session::get('error')}}
        </p>
    @endif
    <h1>Listado de movimientos</h1>
    <a href="{{route('movements.create')}}">Crear</a>
    <table>
        <thead>
            <tr>
                <th>Tipo</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Caja</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movements as $movement)
                <tr>
                    <td>{{$movement->type}}</td>
                    <td><a href="{{route('products.show', $movement->product)}}"></a>{{$movement->product->name}}</td>
                    <td>{{$movement->ammount}}</td>
                    <td>{{$movement->sale_point}}</td>
                    <td>{{$movement->created_at->format('d-m-Y')}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
@endsection