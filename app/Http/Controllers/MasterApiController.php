<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;


class MasterApiController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    // protected $data['data'] = '1';

    public function index ()
    {
        $data['data'] = $this->model->all();
        return response()->json($data);
    }

   
    public function store(Request $request)
    {
        $this->validate($request, $this->model->rules());

        $dataForm = $request->all();

        if($request->hasFile($this->upload) && $request->file($this->upload)->isValid()){
            $extension = $request->file($this->upload)->extension();
            $name = uniqid(date('His'));
            $nameFile =  "{$name}.{$extension}";
            $upload = Image::make($dataForm[$this->upload])->resize(177, 236)->save(storage_path("app/public/usuarios/$nameFile", 70));
       
            if(!$upload){
                return response()->json(['error'=> "Falha ao fazer upload"], 500);
            }else{
                $dataForm[$this->upload] = $nameFile;
            }
        }

        if($data['data'] = $this->model->create($dataForm)){
            return response()->json(['sucess' => 'Cadastro realizado com sucesso!!']);

        }else{
            return response()->json(['error' => 'Não cadastrado, tente mais tarde!!']);

        }
    }

    
    public function show($id)
    {
        if(!$data = $this->model->find($id)){
            return response()->json(['error' => 'Nada por aqui, verifique os parâmentros!'], 404);
        }else{
            // $dado['data'] = $data;
            return response()->json($data);
        }
    }

   

    public function update(Request $request, $id)
    {
        if(!$data = $this->model->find($id)){
            return response()->json(['error' => 'Nada por aqui, verifique os parâmentros!'], 404);   
        }


        $this->validate($request, $this->model->rules());

        $dataForm = $request->all();

        if($request->hasFile($this->upload) && $request->file($this->upload)->isValid()){
            $arquivo = $this->model->arquivo($id);
            if($arquivo){
                Storage::disk('public')->delete("/{$this->path}/$arquivo");
            }

            $extension = $request->file($this->upload)->extension();
            $name = uniqid(date('His'));
            $nameFile =  "{$name}.{$extension}";
            $upload = Image::make($dataForm[$this->upload])->resize(177, 236)->save(storage_path("app/public/{$this->path}/{$nameFile}", 70));
       
            if(!$upload){
                return response()->json(['error'=> "Falha ao fazer upload"], 500);
            }else{
                $dataForm[$this->upload] = $nameFile;
            }
        }

        $data->update($dataForm);

        return response()->json($data);
    }
  
    public function destroy($id)
    {
        if($data = $this->model->find($id)){

            if(method_exists($this->model, 'arquivo')){
                Storage::disk('public')->delete("/{$this->path}/{$this->model->arquivo($id)}");
            }

            $data->delete();
            return response()->json(['sucess' => "Deletado com sucesso!!"]);
    
        }else{
            return response()->json(['error' => 'Nada por aqui, verifique os parâmentros!'], 404);
        }

       
       
     }



}
