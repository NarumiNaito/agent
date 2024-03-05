<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */

    
    public function rules(): array
    {
        return [
            'name' => ['string', 'max:50'],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'tel' => ['required', 'max:20','unique:users,tel'],
            'postcode' => ['required', 'max:7'],
            'address' => ['required', 'max:100'],
            'memo' => ['max:1000'], 
            'detail' => ['max:1000'], 
        ];
    }
}
