<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Postagem;

class Categoria extends Model
{
    protected $fillable = [
        'categoria',
    ];

 public function rules()
 {
    return [
        'categoria' => 'required',
    ];
 }


 public function postagens()
 {
 return $this->hasMany(Postagem::class, 'id_cat', 'id');
 }
}
