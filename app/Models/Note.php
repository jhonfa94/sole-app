<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    protected $table = 'notes';
    protected $fillable = ['description', 'writing_date', 'user_id'];

    /**
     * Relacion uno a muchos
     * ? Un usuario realiza varias notas
     * ? una nota pertenece a un solo usuario
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
