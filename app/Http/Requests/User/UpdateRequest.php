<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\JsonUnique;

class UpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'user_id' => 'required|numeric|exists:App\Models\User,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $this->user_id,
            'rfc' => [
                'required',
                new JsonUnique('users', 'payload->rfc', $this->user_id)
            ]
        ];
    }
}
