<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SermonRequest extends FormRequest
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
            'titre'=>['required',"string"],
            "description"=>["required","string"],
            "author"=>["required","string"],
            "poster_url"=>["required","file"],
            "video_url"=>["required","file"]
        ];

    }
}
