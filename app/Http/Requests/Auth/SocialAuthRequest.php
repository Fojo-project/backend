<?php

namespace App\Http\Requests\Auth;

use App\Enums\Provider;
use App\Traits\AuthenticatesUsersRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SocialAuthRequest extends FormRequest
{
    use AuthenticatesUsersRequest;
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'provider' => ['required', 'string', Rule::in(array_column(Provider::cases(), 'value'))],
            'full_name' => ['string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ];
    }
}
