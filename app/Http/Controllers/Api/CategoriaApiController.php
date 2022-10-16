<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\MasterApiController;
use Illuminate\Http\Request;
use App\Models\Categoria;


class CategoriaApiController extends MasterApiController
{
    // protected $upload = 'image';
    // protected $model;
    // protected $path = 'usuarios';
    protected $data;

    public function  __construct(Categoria $cat, Request $request)
    {
        $this->model = $cat;
        $this->request = $request;
    }
    
    public function postByCategoria($id_cat)
    {
    if(!$data = $this->model->with('categoriaDe')->find($id_cat)){
        return response()->json(['error' => 'Nada por aqui, verifique os parâmentros!'], 404);
    }else{

        return response()->json($data);
    }

    }





}
