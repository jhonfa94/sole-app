<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    protected $table = 'authors';
    protected $fillable = ['full_name', 'birth_date', 'country'];

    /**
     * RELACION UNO A UNO
     * ? un autor tiene un único perfil,
     * ? un perfil pertenece a un único autor
     *
     */
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    /**
     * Relacion muchos a muchos
     * ? Un author escribe uno o varios libros
     * ? un libro esta estrito por uno o varios autores
     */
    public function books()
    {
        return $this->belongsToMany(Book::class);
    }

    /**
     * Relacion poliformica
     * ? un autor tiene una imagen,
     * ? una imagen pertenece a un solo autor
     */
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    /**
     * Relacion Poliformica uno muchos
     * ? un autor recibe muchas notas
     * ? una nota pertenece a un solo autor
     */
    public function note()
    {
        return $this->morphToMany(Note::class, 'noteable');
    }

    /**
     * Relacion poliformica muchos a muchos
     * ? un autor es calificado por una o varios usuarios
     * ? un usuario califica a uno o varios autores
     */
    public function users()
    {
        return $this->morphToMany(User::class, 'userable');
    }
}
