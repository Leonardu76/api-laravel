<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\MasterApiController;
use Illuminate\Http\Request;
use App\Models\Postagem;

class PostagemApiController extends MasterApiController
{
    protected $upload = 'image';
    protected $model;
    protected $path = 'postagem';



    public function  __construct(Postagem $post, Request $request)
    {
        $this->model = $post;
        $this->request = $request;
    }

    public function autorById($id)
    {
    if(!$data = $this->model->with('autor')->find($id)){
        return response()->json(['error' => 'Nada por aqui, verifique os parâmentros!'], 404);
    }else{

        return response()->json($data);
    }

    }
}
