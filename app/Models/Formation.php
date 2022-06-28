<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;
    protected $fillable = [
        'titre', 'heures'
    ];
    protected $withCount=['etudiants'];
    public  function etudiants(){
        return $this->hasMany(Etudiant::class);
    }
}
