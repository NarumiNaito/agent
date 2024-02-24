<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWorkRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'workName' => ['required', 'max:50'],           
            'price' => ['required', 'numeric'],
            'deadline' => ['required', 'numeric'],
            'content' => ['required', 'max:255'],
            'skill' => ['required', 'max:255'],
            'memo' => ['required', 'max:255'],
            'status' => ['required','boolean']
        ];
    }
}
