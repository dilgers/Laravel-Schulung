<?php

namespace App\Http\Requests;

use App\Rules\IsAdminEmail;
use Illuminate\Foundation\Http\FormRequest;

class SendKontaktRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Admin Prüfung möglich
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:3'],
            'email' => ['required', 'email:dns', new IsAdminEmail()],
            'message' => ['required', 'string']
        ];
    }
}
