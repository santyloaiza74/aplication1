<?php

namespace App\Http\Controllers;

use App\Models\Movement;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class MovementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movements = Movement::all();
        return view('movements.index', compact('movements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products= Product::all();
        return view('movements.create', ['products'=>$products, 'movements_type'=>[Movement::MOVEMENT_TYPE_OUT, Movement::MOVEMENT_TYPE_IN, Movement::MOVEMENT_TYPE_DEVOLUTION]]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        $movement= new Movement();
        $movement->type= $request->type;
        $movement->product_id= $request->product;
        $movement->ammount= $request->ammount;
        $movement->sale_point= $request-> sale_point;
        $movement->save();

        $product=Product::find($request->product);
        try {
            switch ($movement->type) {
                case Movement::MOVEMENT_TYPE_OUT:
                    if ($product->ammount < $movement->ammount){
                        throw new Exception('Verificar cantidades existentes');
                    }
                    $product->decrement('ammount', $movement->ammount);
                    break;
                case Movement::MOVEMENT_TYPE_IN:
                case Movement::MOVEMENT_TYPE_DEVOLUTION:
                    $product->increment('ammount', $movement->ammount);
                    break;
            }
            $product->save();
        } catch (\Exception $ex) {
            Log::error("Error al intentar guardar el registro");
            Session::flash('error',$ex->getMessage());
            DB::rollBack();
            return redirect()->route('movements.index');
        }
        DB::commit();
        return Redirect::route('movements.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Movement $movement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movement $movement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movement $movement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movement $movement)
    {
        //
    }
}
