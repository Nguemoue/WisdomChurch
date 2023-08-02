<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SermonUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
			'titre'=>"required",
			"type"=>"required",
			"video_link"=>"nullable",
			"video_url"=>"nullable",
			"author"=>"required",
			"poster_url"=>"nullable",
			"description"=>"required|string"
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
