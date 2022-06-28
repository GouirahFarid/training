<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EtudianPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cne'=>'required|alpha_num|min:10|unique:etudiants',
            'prenom'=>'required|alpha|min:5',
            'nom'=>'required|alpha|min:5',
            'bacType'=>'required|alpha|min:5',
            'dateNaissance'=>'required:date',
            'formationId'=>'required|numeric'
        ];
    }
}
