<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idee extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom','description','email','status','categorie_id','libelle',
    ];


    
    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function commentaires()
{
    return $this->hasMany(Commentaire::class);
}
}
