<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class RepertoireRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'      => 'required|string',
            'image'     => (($this->repertoire) ? '' : 'required|') .'image|mimes:jpeg,png,jpg,gif,svg',
            'time'      => 'required',
            'age_limit' => 'required|string',
            'price'     => 'required|integer|min:0'
        ];
    }
}
