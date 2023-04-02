<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
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

    /* De la misma forma que tengo esta configuración para el usuario, tengo
    que asignarsela a los Post para que me permita la asignación masiva */
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

    /* Al momento de escribir este comentario no existe la configuración masiva de datos para este método.
    Por lo tanto, dará error
    "Add [title] to fillable property to allow mass assignment on [App\Models\Post]"
    Esto sucede porque estoy mandando hasta 3 datos y todavía no hice ninguna configuración.

    Para corregir este error salta a la línea 20 de este mismo archivo.
    */
    public function posts() {
       return $this->hasMany(Post::class);
    }
}
