<?php

namespace App\Http\Controllers\Api;

use App\Models\Usuario;
use App\Http\Controllers\MasterApiController;
use Illuminate\Http\Request;


class UserApiController extends MasterApiController
{
    protected $upload = 'image';
    protected $model;
    protected $path = 'usuarios';

    public function  __construct(Usuario $usuarios, Request $request)
    {
        $this->model = $usuarios;
        $this->request = $request;
    }
    
    public function postById($id_user)
    {
    if(!$data = $this->model->with('categoria')->find($id_user)){
        return response()->json(['error' => 'Nada por aqui, verifique os parâmentros!'], 404);
    }else{

        return response()->json($data);
    }

    }

}
