<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $table = 'genres';
    protected $fillable = ['name', 'description'];

    /**
     * Relacion uno a muchos
     *  ? un género literario tiene muchos libros
     */
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
