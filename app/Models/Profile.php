<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $table = 'profiles';
    protected $fillable = ['career', 'biography', 'website', 'email'];

    /**
     * Relacion de uno a uno
     */
    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
