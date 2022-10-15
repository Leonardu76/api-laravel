<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Postagem;


class Usuario extends Model
{
    protected $fillable = [
        'nome',
        'sobrenome',
        'email',
        'senha',
        'image'
    ];

 public function rules()
 {
    return [
        'nome' => 'required',
        'sobrenome' => 'required',
        'email' => 'required|unique:usuarios',
        'senha' => 'required',
        'image' => 'image'
    ];
 }

 public function arquivo($id)
 {
    $data = $this->find($id);
    return $data->image;
 }

 public function post()
 {
 return $this->hasOne(Postagem::class, 'id_user', 'id');
 }
 
}
