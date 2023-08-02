<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "password"=>"nullable|confirmed",
			"photo_url"=>"nullable|image"
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
