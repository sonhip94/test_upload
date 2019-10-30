<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\User;


class RegisterRequest extends FormRequest
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
           'name' => 'required',
            'email' => 'required|unique:User',
            'password' => 'required'
        ];
    }

    public function message (){
        // try to validation register page -
        return [
            'name.required' => 'please enter name',
            'email.required' => 'please enter email',
             'email.unique' => 'email registed',
            'password.required' =>  'please enter password'
        ];
    }
}
