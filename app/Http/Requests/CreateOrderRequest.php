<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
{
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
            'first_name' => ['required'],
            'last_name' => ['required'],
            'address' => ['required'],
            'country' => ['required', 'size:2'],
            'city' => ['required'],
            'postal_code' => ['required', 'numeric'],
            'payment_type' => ['required'],
            // Credit card
            'card_nr' => ['required_if:payment_type,credit_card'],
            'card_name' => ['required_if:payment_type,credit_card'],
            'card_expiry' => ['required_if:payment_type,credit_card'],
            'card_cvc' => ['required_if:payment_type,credit_card'],
        ];
    }

    protected function prepareForValidation(): void
    {
        if ($this->input('payment_type') == 'credit_card') {
            $this->merge([
                'card_nr' => str_replace(' ', '', $this->input('card_nr')),
                'card_expiry' => str_replace([' ', '/'], ['', ''], $this->input('card_expiry')),
            ]);
        }
    }
}
