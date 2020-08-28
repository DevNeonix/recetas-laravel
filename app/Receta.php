<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    protected $fillable = ["titulo", "preparacion", "ingredientes", "imagen", "categoria_id"];

    public function categoria()
    {
        return $this->belongsTo(CategoriaReceta::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
