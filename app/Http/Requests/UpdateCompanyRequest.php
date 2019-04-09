<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateCompanyRequest extends FormRequest
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
            'email'             => 'required|string|email',
            'about'             => 'required|string',
            'address'           => 'required|string',
            'phone_number'      => 'required|string|size:16',
            'url_to_youtube'    => 'required|string',
            'url_to_facebook'   => 'required|string',
            'url_to_instagram'  => 'required|string',
            'map'               => 'required|string'
        ];
    }
}
