<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;
use App\Models\Categoria;

class Postagem extends Model
{

    protected $fillable = [
        'id_user',
        'id_cat',
        'titulo',
        'autor',
        'conteudo',
        'image',
    ];

 public function rules()
 {
    return [
        'id_user' => 'required',
        'id_cat' => 'required',
        'titulo' => 'required',
        'autor' => 'required',
        'conteudo' => 'required',
        'image' => 'image',
    ];
 }


 public function categoria()
 {
 return $this->belongsTo(Categoria::class, 'id_cat', 'id');
 }
}