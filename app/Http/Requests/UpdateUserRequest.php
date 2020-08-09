<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => 'string',
            'email' => 'email|unique:users,email,'.$this->id,
            'image' => 'image|nullable',
            'gender' => 'integer',
            'dob' => 'sometimes|date',
        ];
    }

    public function prepareForValidation()
    {
        if($this->password == null) {
            $this->request->remove('password');
        }
        if($this->dob == null) {
            $this->request->remove('dob');
        }
    }
}
