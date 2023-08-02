<?php

namespace App\Http\Requests\Testimony;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'content'=>"required|string",
			"user_id"=>"required|string"
        ];
    }

    public function authorize(): bool
    {
         return true;
    }
}
