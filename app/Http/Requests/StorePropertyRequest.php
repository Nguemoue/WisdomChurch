<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePropertyRequest extends FormRequest
{
    public function rules(): array
    {
        	$validated = [];
        	foreach (config('app.props_name') as $key=>$name){
        		$validated["$key"]="required";
			}
        	return  $validated;

    }

    public function authorize(): bool
    {
        return true;
    }
}
