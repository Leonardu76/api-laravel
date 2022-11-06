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
        'image',
        'sobre',
        'insta',
        'face',
        'twitter',
        'linkdin',
    ];

 public function rules()
 {
    return [
        'nome' => 'required',
        'sobrenome' => 'nullable',
        'email' => 'required|unique:usuarios',
        'senha' => 'required',
        'image' => 'image',
        'sobre' => 'nullable',
        'insta' => 'nullable',
        'face' => 'nullable',
        'twitter'=> 'nullable',
        'linkdin'=> 'nullable'
    ];
 }

 public function arquivo($id)
 {
    $data = $this->find($id);
    return $data->image;
 }

 public function post()
 {
 return $this->hasMany(Postagem::class, 'id_user', 'id');
 }
 
}
