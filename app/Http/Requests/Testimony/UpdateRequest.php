<?php

namespace App\Http\Requests\Testimony;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'content'=>"required|string"
        ];
    }

    public function authorize(): bool
    {
        return true;
    }


}
