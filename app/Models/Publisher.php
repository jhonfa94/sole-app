<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use HasFactory;
    protected $table = 'publishers';
    protected $fillable = [
        'name', 'country', 'website', 'email',
        'description'
    ];

    /**
     * Relacion uno a muchos
     * ? una editorial imprime varios libros
     * ? un libro es impreso (publicado) en una sola editorial
     */
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
