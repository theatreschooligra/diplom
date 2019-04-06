<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
        $rule = [
            'email'         => 'required|string|email|unique:users,email',
            'name'          => 'required|string',
            'surname'       => 'required|string',
            'birthday'      => 'nullable|date_format:d/m/Y',
            'gender'        => 'required|boolean',
            'phone_number'  => 'nullable|string|size:17',
            'address'       => 'nullable|string',
            'image'         => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];

        if ($this->role_id == 3) {
            $rule['parent_surname'] = 'nullable|string';
            $rule['parent_name']    = 'nullable|string';
            $rule['group_id']       = 'nullable|integer|min:1';
        } else if ($this->role_id == 2) {
            $rule['experience'] = 'nullable|string';
            $rule['profession'] = 'nullable|string';
            $rule['about']      = 'nullable|string';
        }

        return $rule;
    }
}
