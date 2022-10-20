<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $table = 'images';
    protected $fillable = ['url'];


    /**
     * Relacion poliformica
     * ? un autor tiene una imagen,
     * ? una imagen pertenece a un solo autor
     */
    public function imageable()
    {
        return $this->morphTo();
    }
}
