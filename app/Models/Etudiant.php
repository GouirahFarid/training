<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;
    protected $with=['formation'];
    protected $fillable = [
        'cne', 'prenom','nom','bac_type','date_naissance','formation_id'
    ];
}
