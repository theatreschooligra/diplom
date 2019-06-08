<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordRequest extends FormRequest
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
            'old_password' => 'required|string',
            'password'     => 'required|string|confirmed',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator){
            $user = $this->route('user');
            if (!Hash::check($this->old_password, $user->password)) {
                $validator->errors()->add('old_password', 'Пароль не верен');
            }
        });
    }
}
