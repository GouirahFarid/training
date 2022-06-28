<?php

namespace App\Http\Controllers;

use App\Http\Requests\EtudianPostRequest;
use App\Http\Requests\EtudiantPutRequest;
use App\Models\Etudiant;
use App\Models\Formation;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    public function create(EtudianPostRequest $request){
        $formation=Formation::query()->find($request->formationId);
        if (!$formation)
            return  response()->json([
                'message'=>"Formation not found",
            ],422);
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
    public function update(EtudiantPutRequest  $request){
        $formation=Formation::query()->find($request->formationId);
        if (!$formation)
            return  response()->json([
                'message'=>"Formation not found",
            ],422);

        return Etudiant::query()->find($request->etudiantId)->update([
                'prenom'=>$request->prenom,
                'nom'=>$request->nom,
                'bac_type'=>$request->bacType,
                'date_naissance'=>$request->dateNaissance,
                'formation_id'=>$request->formationId
        ]);
    }
    public function delete(Request  $request){
        return Etudiant::query()->find($request->etudiantId)->delete();
    }
    public function get(Request  $request){
        return Etudiant::query()->find($request->etudiantId)->first();
    }
    public function all(Request  $request){
        return Etudiant::all();
    }
}
