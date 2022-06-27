<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Formation;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    public function create(Request  $request){
        $formation=Formation::query()->find($request->formationId);
        if (!$formation)
            return  response()->json([
                'message'=>"Formation not found",
            ],404);
        $etudiant=$formation->etudiants()->where('etudiants.cne',$request->cne)->first('etudiants.id');
        if ($etudiant)
            return  response()->json([
                'message'=>"Etudiatn already exist",
            ],422);
        return $formation->etudiants()->create([
            'cne'=>$request->cne,
            'prenom'=>$request->prenom,
            'nom'=>$request->nom,
            'bac_type'=>$request->bacType,
            'date_naissance'=>$request->dateNaissance,
        ]);
    }
    public function update(Request  $request){
        $formation=Formation::query()->find($request->formationId);
        if (!$formation)
            return  response()->json([
                'message'=>"Formation not found",
            ],404);

        return $formation->etudiants()->where('etudiants.id',$request->etudiantId)->update([
                'prenom'=>$request->prenom,
                'nom'=>$request->nom,
                'bac_type'=>$request->bacType,
                'date_naissance'=>$request->dateNaissance,
        ]);
    }
    public function delete(Request  $request){
        return Etudiant::query()->find($request->etudiantId)->delete();
    }
    public function get(Request  $request){
        return Etudiant::query()->find($request->etudiantId)->first();
    }
    public function all(Request  $request){
        return Etudiant::query()->paginate(20);
    }
}
