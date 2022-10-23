<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\MasterApiController;
use Illuminate\Http\Request;
use App\Models\Categoria;


class CategoriaApiController extends MasterApiController
{
    protected $upload;
    protected $model;
    protected $path;

    public function  __construct(Categoria $cat, Request $request)
    {
        $this->model = $cat;
        $this->request = $request;
    }
    
    public function postByCategoria($id_cat)
    {
    if(!$data = $this->model->with('postagens')->find($id_cat)){
        return response()->json(['error' => 'Nada por aqui, verifique os parâmentros!'], 404);
    }else{
        $dado['data'] = $data;
        return response()->json($dado);
    }

    }





}
