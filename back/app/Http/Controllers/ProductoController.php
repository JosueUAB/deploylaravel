<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//llamar al modelo
use App\Models\Producto;
class ProductoController extends Controller
{
    //=======  ver   =======
    public function index(){
        return Producto::all();
    }

    //======= Guardar en la base de datos =======
    public function store(request $request){
        return Producto::create($request->all());
    }
//========== Modificar Update =====================

    public function update(request $request,$id){
        $producto = Producto::find($id);
        return $producto->update($request->all());
    }

//==========  Delete =================
    public function destroy($id){
        $producto = Producto::find($id);
        return $producto->delete();
    }



}
