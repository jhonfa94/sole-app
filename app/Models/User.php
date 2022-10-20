<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relacion uno a muchos
     * ? Un usuario realiza varias notas
     * ? una nota pertenece a un solo usuario
     */
    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    /**
     * Relacion poliformica muchos a muchos
     * ? un autor es calificado por una o varios usuarios
     * ? un usuario califica a uno o varios autores
     */
    public function authors()
    {
        return $this->morphedByMany(Author::class, 'userable');
    }


    /**
     *  Relacion poliformica muchos a muchos
     *  ? un libro es calificado por uno o varios usuarios
     * ? un usuario califica a uno o varios libros
     */
    public function books()
    {
        return $this->morphedByMany(Book::class, 'userable');
    }
}
