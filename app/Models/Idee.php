<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idee extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom','description', 'date_de_creation','status','categorie_id','description',
    ];


    
    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
}
