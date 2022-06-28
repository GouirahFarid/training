<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormationPostRequest;
use App\Http\Requests\FormationPutRequest;
use App\Models\Formation;
use Illuminate\Http\Request;

class FormationController extends Controller
{
    public function create(FormationPostRequest  $request){

        return Formation::query()->create([
           'titre'=>$request->titre,
           'heures'=>$request->heures
        ]);
    }
    public function update(FormationPutRequest $request){
        return Formation::query()->find($request->formationId)->update([
            'titre'=>$request->titre,
            'heures'=>$request->heures
        ]);
    }
    public function delete(Request  $request){
        return Formation::query()->find($request->formationId)->delete();
    }
    public function get(Request  $request){
        return Formation::query()->find($request->formationId)->first();
    }
    public function all(Request  $request){
        return Formation::all();
    }
}
