<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
{
    public function rules(): array
    {

        $userId = auth()->user()->id;
        return [
            'name' => 'required|min:5|max:255',
            'email' => ['required', 'email', Rule::unique('users')->ignore($userId)],
            'state_id' => 'required|numeric|exists:states,id'
        ];
    }
}
