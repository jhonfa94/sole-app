<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $fillable = [
        'title', 'subtitle', 'language', 'page',
        'published', 'description', 'genre_id', 'publisher_id'
    ];

    /**
     * Relacion de uno a muchos
     * ? un genero esta en muchos libros
     */
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    /**
     * Relacion uno a muchos
     * ? una editorial imprime varios libros
     * ? un libro es impreso (publicado) en una sola editorial
     */
    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    /**
     * Relacion muchos a muchos
     * ? Un author escribe uno o varios libros
     * ? un libro esta estrito por uno o varios autores
     */
    public function aruthors()
    {
        return $this->belongsToMany(Author::class);
    }

    /**
     * Relacion poliformica uno a muchos
     * ? un libro recibe muchas notas
     * ? una nota pertenece a un solo libro
     */
    public function note()
    {
        return $this->morphToMany(Note::class, 'noteable');
    }

    /**
     *  Relacion poliformica muchos a muchos
     *  ? un libro es calificado por uno o varios usuarios
     * ? un usuario califica a uno o varios libros
     */
    public function users()
    {
        return $this->morphToMany(User::class, 'userable');
    }
}
