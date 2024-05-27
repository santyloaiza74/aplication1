@csrf
<div>
    <label for="type">Tipo de movimiento</label>
    <select name="type" id="type">
        <option value="0">Seleccione el tipo de movimiento</option>
        @foreach ($movements_type as $movement)
            <option value="{{$movement}}">{{ucFirst($movement)}}</option>
        @endforeach
    </select>
</div>
<div>
    <label for="product_id">Producto</label>
    <select name="product" id="product">
        <option value="0">Seleccione el producto</option>
        @foreach ($products as $product)
            <option value="{{$product->id}}">{{ucFirst($product->name)}}</option>
        @endforeach
    </select>
</div>
<div>
    <label for="ammount">Cantidad</label>
    <input type="number" name="ammount" id="ammount">
</div>
<div>
    <label for="sale_point">Punto de venta</label>
    <input type="text" name="sale_point" id="sale_point">
</div>
<button>Enviar</button>