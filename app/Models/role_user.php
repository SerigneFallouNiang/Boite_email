<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class role_user extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'role_id',
    ];

    public function isAdmin()
    {
        return $this->role_id=== '2'; // Assurez-vous d'avoir un champ 'role' dans votre table users
    }
}
